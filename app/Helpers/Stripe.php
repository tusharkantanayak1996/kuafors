<?php
namespace App\Helpers;

use App\Company;
use App\Model\StripePaymentMethod;
use App\Owner;
use App\User;
use Exception;

class Stripe{
    public $stripe;
    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }
    public function test(){
        return $this->stripe;
    }

    // public function availablePaymentOptions($user_id){
    //     try{
    //         $paymentOptions = StripePaymentMethod::select('id','card_brand','card_last_four')->where(['user_id'=>$user_id])->get();
    //         if($paymentOptions && !empty($paymentOptions)){
    //             return ['status'=>true,'data'=>$paymentOptions];
    //         }
    //         return ['status'=>false,'message'=>'no payment option available.'];
    //     }catch(Exception $e){
    //         $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
    //         dd($error);
    //     }
        
    // }
    // //single payment
    public function payment($user_id,$user_type,$carddetail){
        // dd($carddetail);
        try{
            $stripe_cus_id = $this->createOrGetCustomer($user_id,$user_type,$carddetail);
            //create payment method and get id
            // dd($stripe_cus_id);

            $paymentMethodId = $this->createOrGetPaymentMethod($user_id,$user_type,$carddetail);
            $carddetail['stripe_cus_id'] = $stripe_cus_id;
            $carddetail['payment_method'] = $paymentMethodId;
            //charge amount
            // dd($paymentMethodId);
            // dd($carddetail);
            $payment = $this->makePaymentUsingPaymentMethods($user_id,$carddetail);
            return $payment;

        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }

    }
    public function createSubscription($user_id,$user_type,$data){
        
        try{
            $stripe_cus_id = $this->createOrGetCustomer($user_id,$user_type,$data);
            $paymentMethodId = $this->createOrGetPaymentMethod($user_id,$user_type,$data);
            $this->stripe->customers->update(
                $stripe_cus_id,
                ['invoice_settings' => ['default_payment_method' => $paymentMethodId]]
            );
            $subscription = $this->stripe->subscriptions->create([
                'customer' => $stripe_cus_id,
                'items' => [
                    ['price' => $data['price_id']],
                ],
            ]);
            if($subscription){
                return ['status'=>true,'data'=>$subscription];
            }else{
                return ['status'=>false,'data'=>'Subscription Failed'];
            }
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
        
    }
    // //cancel subscription
    public function cancelSubscription($subscription_id){
        //dd($subscription_id);
        try{
            $res = $this->stripe->subscriptions->cancel(
                        $subscription_id,
                        []
                    );
            //dd($res);        
            if($res){
                return ['status'=>true,'data'=>$res];
            }else{
                return ['status'=>false,'data'=>'Subscription Failed'];
            }
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
        
    }
    //create customer
    public function createOrGetCustomer($user_id,$user_type,$carddetail){
        try{
            
                $user = Owner::find($user_id);

            if($user->stripe_cus_id == ''){
                //Create Customer
                $customer = $this->stripe->customers->create([
                    'email'=> $user->email,
                    'name' => $user->first_name,
                    'description' => 'Owner customer',
                    'address' => [
                        'line1' => $carddetail->billing_address,
                        'city' => $carddetail->billing_city,
                        'state' => $carddetail->billing_state,
                        'country' => strtoupper($carddetail->billing_country),
                        'postal_code' => $carddetail->billing_zipcode
                    ]
                    
                    // 'shipping' => [
                    //     'name' => $user->first_name,
                    //     'address' => [
                    //       'line1' => $carddetail->billing_address,
                    //       'postal_code' => $carddetail->billing_zipcode,
                    //       'city' => $carddetail->billing_city,
                    //       'state' => $carddetail->billing_state,
                    //       'country' => strtoupper($carddetail->billing_country),
                    //     ]
                    //     ],
                       
                ]);
                $stripe_cus_id = $customer->id;
                $user->stripe_cus_id = $stripe_cus_id;
                $user->save();
                return $stripe_cus_id;
            }else{
                $stripe_cus_id = $user->stripe_cus_id;
                return $stripe_cus_id;
            }
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
    }

    public function createOrGetPaymentMethod($user_id,$user_type,$carddetail){
        try{
            
                $user = Owner::find($user_id);
          
            if((bool)$carddetail->new_payment_method){
                $paymentMethod = $this->stripe->paymentMethods->create([
                    'type' => 'card',
                    'card' => [
                        'number' => $carddetail->number,
                        'exp_month' => $carddetail->exp_month,
                        'exp_year' => $carddetail->exp_year,
                        'cvc' => $carddetail->cvc,
                    ],
                    'billing_details' => [
                        'name' => $user->first_name,
                        'email' => $user->email,
                        // 'phone' => '',
                        'address' => [
                            'line1' => $carddetail->billing_address,
                            'city' => $carddetail->billing_city,
                            'state' => $carddetail->billing_state,
                            'country' => strtoupper($carddetail->billing_country),
                            'postal_code' => $carddetail->billing_zipcode
                        ],
                    ]
                ]);

                // dd($carddetail->payment_method_id);
    
                $paymentMethodId = $paymentMethod->id;
    
                $stripePaymentMethod = new StripePaymentMethod();
                $stripePaymentMethod->user_id = $user_id;
                $stripePaymentMethod->user_type = 'owner';
                $stripePaymentMethod->name = $paymentMethod->billing_details->name;
                $stripePaymentMethod->payment_method = $paymentMethodId;
                $stripePaymentMethod->card_brand = $paymentMethod->card->brand;
                $stripePaymentMethod->card_last_four = $paymentMethod->card->last4;
                $stripePaymentMethod->exp_month = $paymentMethod->card->exp_month;
                $stripePaymentMethod->exp_year = $paymentMethod->card->exp_year;
                $stripePaymentMethod->address = json_encode($paymentMethod->billing_details->address);
                // $stripePaymentMethod->is_default = $is_default;
                $stripePaymentMethod->save();
                
                $this->stripe->paymentMethods->attach(
                    $paymentMethodId,
                    ['customer' => $user->stripe_cus_id]
                );
                return $paymentMethodId;
            }else{
                $stripePaymentMethodId = StripePaymentMethod::where([
                    'id'=>$carddetail->payment_method_id,
                    'user_id'=>$user_id,
                    'user_type'=>strtolower($user_type)])->first()->payment_method;
                return $stripePaymentMethodId;
            }            
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
    }
    // //make payment
    public function makePaymentUsingPaymentMethods($user_id,$data){
        try{
            $paymentIntent = $this->stripe->paymentIntents->create([
                'amount' => intval($data->amount) * 100,
                'currency' => 'usd',
                'payment_method' => $data->payment_method,
                'customer' => $data->stripe_cus_id,
                'description' => 'Subscription payment',
                'shipping' => [
                    'name'=> $data->name,
                    'address' => [
                        'line1' => $data->billing_address,
                        'city' => $data->billing_city,
                        'state' => $data->billing_state,
                        'country' => 'IN',
                        'postal_code' => $data->billing_zipcode
                    ]
                ]
              
            ]);
            dd($paymentIntent);

            $confirm = $this->stripe->paymentIntents->confirm(
                $paymentIntent->id,
                ['payment_method' => $data->payment_method]
            );
            if($confirm){
                return [
                    'status'=>true,
                    // 'data'=>$confirm->charges->data[0]->balance_transaction,
                    // 'charge_id'=>$confirm->charges->data[0]->id,
                    // 'amount' => $confirm->amount / 100
                ];
            }else{
                return ['status'=>false,'message'=>'Payment faild, Try again.'];
            }
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
    }

    //make defult payment method
    public function makeDefaultPaymentMethod($user_id,$user_type,$data){
        try{
            $stripe_cus_id = $this->createOrGetCustomer($user_id,$user_type,$data);
            $paymentMethodId = $this->createOrGetPaymentMethod($user_id,$user_type,$data);
            $response = $this->stripe->customers->update(
                $stripe_cus_id,
                ['invoice_settings' => ['default_payment_method' => $paymentMethodId]]
            );
            if($response){
                return ['status'=>true,'data'=>$response];
            }else{
                return ['status'=>false,'message'=>'Customer default payment update failed.'];
            }
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
    }

    // //create Product
    public function createProduct($name,$description){
        try{
            $product = $this->stripe->products->create([
                        'name' => $name,
                        'description' => $description
                    ]);
            return $product;
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
    }
    // //create price
    public function createPrice($amount,$interval,$product){
        // dd($interval);
        try{
            $price = $this->stripe->prices->create([
                'unit_amount' => intval($amount) * 100,
                'currency' => 'usd',
                'recurring' => ['interval' => strtolower($interval)],
                'product' => $product,
            ]);
            
            return $price;
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
    }
    // ## == 
    // public function updateActiveSubscriptionDetails(){
    //     try{
    //         function getDate($timestamp,$format){
    //             $date = new \DateTime();
    //             $date->setTimestamp($timestamp);
    //             $date= $date->format($format);
    //             return $date;
    //         }
    //         $status = 'active';
    //         $limit = 3;
    //         $subscriptions = $this->stripe->subscriptions->all(['limit'=>$limit,'status'=>$status]);
    //         // return $subscriptions;
    //         foreach($subscriptions->data as $subscription){
    //             ### Update subscription_start and subscription_end
    //             BiddingVendor::where(['subscription_id'=>$subscription->id])->update([
    //                 'subscription_start' => getDate($subscription->current_period_start,'Y-m-d'),
    //                 'subscription_end' => getDate($subscription->current_period_end,'Y-m-d')
    //             ]);
    //             dump([
    //                 'subscription_id' => $subscription->id,
    //                 'status' => $subscription->status,
    //                 'subscription_start' => getDate($subscription->current_period_start,'Y-m-d'),
    //                 'subscription_end' => getDate($subscription->current_period_end,'Y-m-d')
    //             ]);
    //         }

    //         while($subscriptions->has_more){
    //             $subscriptions = $this->stripe->subscriptions->all(['limit'=>$limit,'status'=>$status,'starting_after'=>$subscription->id]);
    //             foreach($subscriptions->data as $subscription){
    //                 dump([
    //                     'subscription_id' => $subscription->id,
    //                     'status' => $subscription->status,
    //                     'subscription_start' => getDate($subscription->current_period_start,'Y-m-d'),
    //                     'subscription_end' => getDate($subscription->current_period_end,'Y-m-d')
    //                 ]);
    //             }
    //         }            
    //         return true;
    //     }catch(Exception $e){
    //         $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
    //         dd($error); 
    //     }
        
    //  }

    public function createTechnicianSubscription($user_id,$user_type,$data){
        
        try{
            $stripe_cus_id = $this->createOrGetTechnicianCustomer($user_id,$user_type,$data);
            $paymentMethodId = $this->createOrGetTechnicianPaymentMethod($user_id,$user_type,$data);
            $this->stripe->customers->update(
                $stripe_cus_id,
                ['invoice_settings' => ['default_payment_method' => $paymentMethodId]]
            );
            $subscription = $this->stripe->subscriptions->create([
                'customer' => $stripe_cus_id,
                'items' => [
                    ['price' => $data['price_id']],
                ],
            ]);
            if($subscription){
                return ['status'=>true,'data'=>$subscription];
            }else{
                return ['status'=>false,'data'=>'Subscription Failed'];
            }
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
        
    }

    public function createOrGetTechnicianCustomer($user_id,$user_type,$carddetail){
        try{
            
                $user = User::find($user_id);

            if($user->stripe_cus_id == ''){
                //Create Customer
                $customer = $this->stripe->customers->create([
                    'email'=> $user->email,
                    'name' => $user->first_name,
                    'description' => 'Technician customer',
                    'address' => [
                        'line1' => $carddetail->billing_address,
                        'city' => $carddetail->billing_city,
                        'state' => $carddetail->billing_state,
                        'country' => strtoupper($carddetail->billing_country),
                        'postal_code' => $carddetail->billing_zipcode
                    ]
                    
                    // 'shipping' => [
                    //     'name' => $user->first_name,
                    //     'address' => [
                    //       'line1' => $carddetail->billing_address,
                    //       'postal_code' => $carddetail->billing_zipcode,
                    //       'city' => $carddetail->billing_city,
                    //       'state' => $carddetail->billing_state,
                    //       'country' => strtoupper($carddetail->billing_country),
                    //     ]
                    //     ],
                       
                ]);
                $stripe_cus_id = $customer->id;
                $user->stripe_cus_id = $stripe_cus_id;
                $user->save();
                return $stripe_cus_id;
            }else{
                $stripe_cus_id = $user->stripe_cus_id;
                return $stripe_cus_id;
            }
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
    }

    public function createOrGetTechnicianPaymentMethod($user_id,$user_type,$carddetail){
        try{
            
                $user = User::find($user_id);
          
            if((bool)$carddetail->new_payment_method){
                $paymentMethod = $this->stripe->paymentMethods->create([
                    'type' => 'card',
                    'card' => [
                        'number' => $carddetail->number,
                        'exp_month' => $carddetail->exp_month,
                        'exp_year' => $carddetail->exp_year,
                        'cvc' => $carddetail->cvc,
                    ],
                    'billing_details' => [
                        'name' => $user->first_name,
                        'email' => $user->email,
                        // 'phone' => '',
                        'address' => [
                            'line1' => $carddetail->billing_address,
                            'city' => $carddetail->billing_city,
                            'state' => $carddetail->billing_state,
                            'country' => strtoupper($carddetail->billing_country),
                            'postal_code' => $carddetail->billing_zipcode
                        ],
                    ]
                ]);

                // dd($carddetail->payment_method_id);
    
                $paymentMethodId = $paymentMethod->id;
    
                $stripePaymentMethod = new StripePaymentMethod();
                $stripePaymentMethod->user_id = $user_id;
                $stripePaymentMethod->user_type = 'technician';
                $stripePaymentMethod->name = $paymentMethod->billing_details->name;
                $stripePaymentMethod->payment_method = $paymentMethodId;
                $stripePaymentMethod->card_brand = $paymentMethod->card->brand;
                $stripePaymentMethod->card_last_four = $paymentMethod->card->last4;
                $stripePaymentMethod->exp_month = $paymentMethod->card->exp_month;
                $stripePaymentMethod->exp_year = $paymentMethod->card->exp_year;
                $stripePaymentMethod->address = json_encode($paymentMethod->billing_details->address);
                // $stripePaymentMethod->is_default = $is_default;
                $stripePaymentMethod->save();
                
                $this->stripe->paymentMethods->attach(
                    $paymentMethodId,
                    ['customer' => $user->stripe_cus_id]
                );
                return $paymentMethodId;
            }else{
                $stripePaymentMethodId = StripePaymentMethod::where([
                    'id'=>$carddetail->payment_method_id,
                    'user_id'=>$user_id,
                    'user_type'=>strtolower($user_type)])->first()->payment_method;
                return $stripePaymentMethodId;
            }            
        }catch(Exception $e){
            $error = ['message'=>$e->getMessage(),'file'=>$e->getFile(),'line'=>$e->getLine()];
            dd($error);
        }
    }
}