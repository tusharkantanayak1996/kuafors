<div class="d-flex" id="wrapper">
    <div class="bg-white" id="sidebar-wrapper">
     <div class="sidebar-title py-4 third-text fs-4 fw-bold text-uppercase">
         <div class="row">
             <div class="col-md-4 text-center">
                 <img src="{{asset('assets/images/prof.png')}}" class="w-75" alt="...">
             </div>
             <div class="col-md-8 text-left">
                 <h3>{{ Auth::guard('admin')->user()->name}}</h3>
             </div>
         </div>
     </div>
     <div class="border-bottom"></div>
     <div class="list-group list-group-flush pt-5">
         <a href="{{ url('/admin/home') }}" class="list-group-item list-group-item-action second-text fw-bold">
             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 306.773 306.773" style="enable-background:new 0 0 306.773 306.773;width: 20px; height: 20px;" xml:space="preserve"><g>
                 <path style="fill:#010002;" d="M302.93,149.794c5.561-6.116,5.024-15.49-1.199-20.932L164.63,8.898   c-6.223-5.442-16.2-5.328-22.292,0.257L4.771,135.258c-6.092,5.585-6.391,14.947-0.662,20.902l3.449,3.592   c5.722,5.955,14.971,6.665,20.645,1.581l10.281-9.207v134.792c0,8.27,6.701,14.965,14.965,14.965h53.624   c8.264,0,14.965-6.695,14.965-14.965v-94.3h68.398v94.3c-0.119,8.264,5.794,14.959,14.058,14.959h56.828   c8.264,0,14.965-6.695,14.965-14.965V154.024c0,0,2.84,2.488,6.343,5.567c3.497,3.073,10.842,0.609,16.403-5.513L302.93,149.794z"/>
                 </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg> Home</a>
         <a href="{{ url('/admin/owner') }}" class="list-group-item list-group-item-action  second-text fw-bold">
             <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 898.266 1026.587">
                 <path id="bell-regular" d="M881,726.411c-38.738-41.625-111.22-104.243-111.22-309.36,0-155.793-109.235-280.507-256.527-311.1V64.162a64.122,64.122,0,1,0-128.243,0v41.785c-147.291,30.6-256.526,155.311-256.526,311.1,0,205.117-72.483,267.735-111.22,309.36A62.645,62.645,0,0,0,0,769.94C.221,802.823,26.026,834.1,64.363,834.1H833.9c38.337,0,64.162-31.279,64.362-64.162A62.612,62.612,0,0,0,881,726.41ZM135.4,737.859c42.547-56.081,89.064-149.036,89.285-319.645,0-.4-.12-.762-.12-1.163,0-124.033,100.533-224.566,224.566-224.566S673.7,293.018,673.7,417.051c0,.4-.12.762-.12,1.163.221,170.63,46.738,263.584,89.285,319.645Zm313.731,288.728A128.3,128.3,0,0,0,577.4,898.263H320.869A128.3,128.3,0,0,0,449.133,1026.587Z" transform="translate(0.001)"/>
             </svg> Salon Owner</a>
             <a href="{{ url('/admin/technician') }}" class="list-group-item list-group-item-action  second-text fw-bold">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="headset" class="svg-inline--fa fa-headset fa-w-16" role="img" viewBox="0 0 512 512" style="width: 20px;"><path fill="currentColor" d="M192 208c0-17.67-14.33-32-32-32h-16c-35.35 0-64 28.65-64 64v48c0 35.35 28.65 64 64 64h16c17.67 0 32-14.33 32-32V208zm176 144c35.35 0 64-28.65 64-64v-48c0-35.35-28.65-64-64-64h-16c-17.67 0-32 14.33-32 32v112c0 17.67 14.33 32 32 32h16zM256 0C113.18 0 4.58 118.83 0 256v16c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-16c0-114.69 93.31-208 208-208s208 93.31 208 208h-.12c.08 2.43.12 165.72.12 165.72 0 23.35-18.93 42.28-42.28 42.28H320c0-26.51-21.49-48-48-48h-32c-26.51 0-48 21.49-48 48s21.49 48 48 48h181.72c49.86 0 90.28-40.42 90.28-90.28V256C507.42 118.83 398.82 0 256 0z"/></svg> Beauty Professional</a>

         <a href="{{ url('/admin/coupons') }}" class="list-group-item list-group-item-action second-text fw-bold">
             <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 1019.719 976">
                 <path id="star-regular" d="M987.993,326.893l-278.469-40.6L585.062,33.939c-22.3-44.982-86.914-45.554-109.405,0L351.194,286.295l-278.469,40.6C22.788,334.136,2.775,395.7,38.989,430.961L240.455,627.281,192.8,904.606c-8.577,50.128,44.22,87.677,88.439,64.233L530.359,837.9,779.475,968.839c44.22,23.253,97.016-14.1,88.439-64.233L820.264,627.281,1021.73,430.961c36.214-35.261,16.2-96.826-33.736-104.068ZM722.1,595.26l45.172,263.792L530.359,734.589,293.442,859.052,338.614,595.26,146.869,408.47l264.936-38.5L530.359,129.811,648.913,369.969l264.936,38.5Z" transform="translate(-20.5 0.013)"/>
             </svg> Coupons</a>

             <a href="{{ url('/admin/owner-plans') }}" class="list-group-item list-group-item-action  second-text fw-bold">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 1285.105 999.406">
                    <path id="comments-regular" d="M1186.8,822.155c61.347-60.455,98.156-136.3,98.156-219.066,0-178.465-170.658-325.922-393.07-352.246C821.618,122.348,656.538,32,464.018,32,207.7,32,.008,191.727.008,388.931c0,82.54,36.808,158.388,98.156,219.066-34.131,68.486-83.209,121.58-84.1,122.472a51.632,51.632,0,0,0,37.478,87c119.349,0,215.72-45.062,279.3-86.555a635.872,635.872,0,0,0,63.355,10.931C464.241,869.895,628.652,960.02,820.949,960.02a590.485,590.485,0,0,0,133.4-15.17c63.578,41.27,159.727,86.556,279.3,86.556a51.633,51.633,0,0,0,37.478-87C1270.235,943.735,1220.934,890.642,1186.8,822.155Zm-876.265-205.9-38.147,24.762c-31.455,20.3-63.578,36.362-96.148,47.739,6.023-10.485,12.046-21.639,17.847-33.016l34.578-69.379L173.343,531.7c-30.116-29.893-66.255-78.748-66.255-142.772,0-135.411,163.519-249.852,356.931-249.852S820.949,253.52,820.949,388.931,657.43,638.782,464.018,638.782a486.087,486.087,0,0,1-109.31-12.493l-44.17-10.039Zm801.086,129.61-55.1,54.432,34.578,69.378c5.8,11.378,11.823,22.531,17.847,33.016-32.57-11.377-64.694-27.439-96.148-47.74l-38.147-24.762-44.393,10.262a486.087,486.087,0,0,1-109.31,12.493c-120.464,0-227.99-44.84-292.906-110.872C754.024,717.976,928.028,569.4,928.028,388.931c0-7.585-.892-14.946-1.562-22.308,143.665,32.347,251.413,126.711,251.413,236.467C1177.88,667.114,1141.74,715.969,1111.624,745.861Z" transform="translate(0.007 -32)"/>
                </svg> Owner Plans</a>
                <a href="{{ url('/admin/technician-plans') }}" class="list-group-item list-group-item-action  second-text fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 1285.105 999.406">
                        <path id="comments-regular" d="M1186.8,822.155c61.347-60.455,98.156-136.3,98.156-219.066,0-178.465-170.658-325.922-393.07-352.246C821.618,122.348,656.538,32,464.018,32,207.7,32,.008,191.727.008,388.931c0,82.54,36.808,158.388,98.156,219.066-34.131,68.486-83.209,121.58-84.1,122.472a51.632,51.632,0,0,0,37.478,87c119.349,0,215.72-45.062,279.3-86.555a635.872,635.872,0,0,0,63.355,10.931C464.241,869.895,628.652,960.02,820.949,960.02a590.485,590.485,0,0,0,133.4-15.17c63.578,41.27,159.727,86.556,279.3,86.556a51.633,51.633,0,0,0,37.478-87C1270.235,943.735,1220.934,890.642,1186.8,822.155Zm-876.265-205.9-38.147,24.762c-31.455,20.3-63.578,36.362-96.148,47.739,6.023-10.485,12.046-21.639,17.847-33.016l34.578-69.379L173.343,531.7c-30.116-29.893-66.255-78.748-66.255-142.772,0-135.411,163.519-249.852,356.931-249.852S820.949,253.52,820.949,388.931,657.43,638.782,464.018,638.782a486.087,486.087,0,0,1-109.31-12.493l-44.17-10.039Zm801.086,129.61-55.1,54.432,34.578,69.378c5.8,11.378,11.823,22.531,17.847,33.016-32.57-11.377-64.694-27.439-96.148-47.74l-38.147-24.762-44.393,10.262a486.087,486.087,0,0,1-109.31,12.493c-120.464,0-227.99-44.84-292.906-110.872C754.024,717.976,928.028,569.4,928.028,388.931c0-7.585-.892-14.946-1.562-22.308,143.665,32.347,251.413,126.711,251.413,236.467C1177.88,667.114,1141.74,715.969,1111.624,745.861Z" transform="translate(0.007 -32)"/>
                    </svg> Technician Plans</a>
                    <a href="{{ url('/admin/question') }}" class="list-group-item list-group-item-action  second-text fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 1285.105 999.406">
                            <path id="comments-regular" d="M1186.8,822.155c61.347-60.455,98.156-136.3,98.156-219.066,0-178.465-170.658-325.922-393.07-352.246C821.618,122.348,656.538,32,464.018,32,207.7,32,.008,191.727.008,388.931c0,82.54,36.808,158.388,98.156,219.066-34.131,68.486-83.209,121.58-84.1,122.472a51.632,51.632,0,0,0,37.478,87c119.349,0,215.72-45.062,279.3-86.555a635.872,635.872,0,0,0,63.355,10.931C464.241,869.895,628.652,960.02,820.949,960.02a590.485,590.485,0,0,0,133.4-15.17c63.578,41.27,159.727,86.556,279.3,86.556a51.633,51.633,0,0,0,37.478-87C1270.235,943.735,1220.934,890.642,1186.8,822.155Zm-876.265-205.9-38.147,24.762c-31.455,20.3-63.578,36.362-96.148,47.739,6.023-10.485,12.046-21.639,17.847-33.016l34.578-69.379L173.343,531.7c-30.116-29.893-66.255-78.748-66.255-142.772,0-135.411,163.519-249.852,356.931-249.852S820.949,253.52,820.949,388.931,657.43,638.782,464.018,638.782a486.087,486.087,0,0,1-109.31-12.493l-44.17-10.039Zm801.086,129.61-55.1,54.432,34.578,69.378c5.8,11.378,11.823,22.531,17.847,33.016-32.57-11.377-64.694-27.439-96.148-47.74l-38.147-24.762-44.393,10.262a486.087,486.087,0,0,1-109.31,12.493c-120.464,0-227.99-44.84-292.906-110.872C754.024,717.976,928.028,569.4,928.028,388.931c0-7.585-.892-14.946-1.562-22.308,143.665,32.347,251.413,126.711,251.413,236.467C1177.88,667.114,1141.74,715.969,1111.624,745.861Z" transform="translate(0.007 -32)"/>
                        </svg> Questions</a>
                    <a href="{{ url('/admin/cancelledsubscriptions') }}" class="list-group-item list-group-item-action  second-text fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 1285.105 999.406">
                            <path id="comments-regular" d="M1186.8,822.155c61.347-60.455,98.156-136.3,98.156-219.066,0-178.465-170.658-325.922-393.07-352.246C821.618,122.348,656.538,32,464.018,32,207.7,32,.008,191.727.008,388.931c0,82.54,36.808,158.388,98.156,219.066-34.131,68.486-83.209,121.58-84.1,122.472a51.632,51.632,0,0,0,37.478,87c119.349,0,215.72-45.062,279.3-86.555a635.872,635.872,0,0,0,63.355,10.931C464.241,869.895,628.652,960.02,820.949,960.02a590.485,590.485,0,0,0,133.4-15.17c63.578,41.27,159.727,86.556,279.3,86.556a51.633,51.633,0,0,0,37.478-87C1270.235,943.735,1220.934,890.642,1186.8,822.155Zm-876.265-205.9-38.147,24.762c-31.455,20.3-63.578,36.362-96.148,47.739,6.023-10.485,12.046-21.639,17.847-33.016l34.578-69.379L173.343,531.7c-30.116-29.893-66.255-78.748-66.255-142.772,0-135.411,163.519-249.852,356.931-249.852S820.949,253.52,820.949,388.931,657.43,638.782,464.018,638.782a486.087,486.087,0,0,1-109.31-12.493l-44.17-10.039Zm801.086,129.61-55.1,54.432,34.578,69.378c5.8,11.378,11.823,22.531,17.847,33.016-32.57-11.377-64.694-27.439-96.148-47.74l-38.147-24.762-44.393,10.262a486.087,486.087,0,0,1-109.31,12.493c-120.464,0-227.99-44.84-292.906-110.872C754.024,717.976,928.028,569.4,928.028,388.931c0-7.585-.892-14.946-1.562-22.308,143.665,32.347,251.413,126.711,251.413,236.467C1177.88,667.114,1141.74,715.969,1111.624,745.861Z" transform="translate(0.007 -32)"/>
                        </svg>Cancelled Subscriptions</a>
                        <a href="{{ url('/admin/annoucement') }}" class="list-group-item list-group-item-action  second-text fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 1285.105 999.406">
                            <path id="comments-regular" d="M1186.8,822.155c61.347-60.455,98.156-136.3,98.156-219.066,0-178.465-170.658-325.922-393.07-352.246C821.618,122.348,656.538,32,464.018,32,207.7,32,.008,191.727.008,388.931c0,82.54,36.808,158.388,98.156,219.066-34.131,68.486-83.209,121.58-84.1,122.472a51.632,51.632,0,0,0,37.478,87c119.349,0,215.72-45.062,279.3-86.555a635.872,635.872,0,0,0,63.355,10.931C464.241,869.895,628.652,960.02,820.949,960.02a590.485,590.485,0,0,0,133.4-15.17c63.578,41.27,159.727,86.556,279.3,86.556a51.633,51.633,0,0,0,37.478-87C1270.235,943.735,1220.934,890.642,1186.8,822.155Zm-876.265-205.9-38.147,24.762c-31.455,20.3-63.578,36.362-96.148,47.739,6.023-10.485,12.046-21.639,17.847-33.016l34.578-69.379L173.343,531.7c-30.116-29.893-66.255-78.748-66.255-142.772,0-135.411,163.519-249.852,356.931-249.852S820.949,253.52,820.949,388.931,657.43,638.782,464.018,638.782a486.087,486.087,0,0,1-109.31-12.493l-44.17-10.039Zm801.086,129.61-55.1,54.432,34.578,69.378c5.8,11.378,11.823,22.531,17.847,33.016-32.57-11.377-64.694-27.439-96.148-47.74l-38.147-24.762-44.393,10.262a486.087,486.087,0,0,1-109.31,12.493c-120.464,0-227.99-44.84-292.906-110.872C754.024,717.976,928.028,569.4,928.028,388.931c0-7.585-.892-14.946-1.562-22.308,143.665,32.347,251.413,126.711,251.413,236.467C1177.88,667.114,1141.74,715.969,1111.624,745.861Z" transform="translate(0.007 -32)"/>
                        </svg>Annoucements</a>
             
          
          
     </div>
 </div>