<div id="sidebar" class="sidebar py-3">

    <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-3 font-weight-bold small headings-font-family">MAIN</div>

    <ul class="sidebar-menu list-unstyled">
        <li class="sidebar-list-item">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link text-muted {{request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt mr-3 text-gray"></i><span>Dashboard</span>
            </a>
        </li>

      
        <li class="sidebar-list-item">
            <a href="{{ route('admin.booking') }}" class="sidebar-link text-muted {{request()->routeIs('admin.booking*') ? 'active' : '' }}">

                <i class="fas fa-phone-volume mr-3 text-gray"></i><span>Booking List</span>
            </a>
        </li>
        <li class="sidebar-list-item">
            <a href="{{ route('admin.guest') }}" class="sidebar-link text-muted {{request()->routeIs('admin.guest*') ? 'active' : '' }}">
                <i class="far fa-address-book mr-3 text-gray"></i><span>Guests</span>
            </a>
        </li>
    </ul>

    <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-3 font-weight-bold small headings-font-family">Room</div>

    <ul class="sidebar-menu list-unstyled">
        {{-- @hasanyrole('Admin|Reservation Staff|Service Staff') --}}
        {{-- <li class="sidebar-list-item">
            <a href="" class="sidebar-link text-muted {{request()->routeIs('roomtypes*') ? 'active' : '' }}">
                <i class="fas fa-door-open mr-3 text-gray"></i><span>Room Types</span>
            </a>
        </li> --}}
        <li class="sidebar-list-item">
            <a href="#" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted">
                <i class="fas fa-hotel mr-3 text-gray {{request()->routeIs('admin.room*') ? 'active' : '' }}"></i><span>Rooms</span>
            </a>
            <div id="pages" class="collapse">
                <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                    <li class="sidebar-list-item"><a href="{{ route('admin.room') }}" class="sidebar-link text-muted pl-lg-5 {{request()->is('admin.room*') ? 'active' : '' }}">View Rooms</a></li>
                    <li class="sidebar-list-item"><a href="{{ route('admin.room.create') }}" class="sidebar-link text-muted pl-lg-5 {{request()->is('admin.room*') ? 'active' : '' }}">Create Rooms</a></li>
                </ul>
            </div>
        </li>
    </ul>

     <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-3 font-weight-bold small headings-font-family">Newsletters Mails</div>

     <ul class="sidebar-menu list-unstyled">
         <li class="sidebar-list-item">
             <a href="{{ route('admin.bulk-email') }}" class="sidebar-link text-muted {{request()->routeIs('admin.bulk-email*') ? 'active' : '' }}">
                 <i class="fas fa-door-open mr-3 text-gray"></i><span>Bulk emails</span>
             </a>
         </li>
         <li class="sidebar-list-item">
             <a href="{{ route('admin.newsletter') }}" class="sidebar-link text-muted {{request()->routeIs('admin.newsletter*') ? 'active' : '' }}">
                 <i class="fas fa-newspaper mr-3 text-gray"></i><span>Newsletter Subscribers</span>
             </a>
         </li>

             <li class="sidebar-list-item">
                <a href="{{ route('admin.inbox') }}" class="sidebar-link text-muted {{request()->routeIs('admin.inbox*') ? 'active' : '' }}">
                    <i class="fas fa-inbox mr-3 text-gray"></i><span>Inbox Message</span>
                </a>
            </li>
     </ul>

      <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-3 font-weight-bold small headings-font-family">Pages</div>

      <ul class="sidebar-menu list-unstyled">
          <li class="sidebar-list-item">
              <a href="{{ route('admin.posts') }}" class="sidebar-link text-muted {{request()->routeIs('admin.posts*') ? 'active' : '' }}">
                  <i class="fas fa-sticky-note open mr-3 text-gray"></i><span>Posts</span>
              </a>
          </li>
          {{-- <li class="sidebar-list-item">
              <a href="{{ route('admin.about-us') }}" class="sidebar-link text-muted {{request()->routeIs('admin.about-us*') ? 'active' : '' }}">
                  <i class="fas fa-info mr-3 text-gray"></i><span>About us</span>
              </a>
          </li> --}}

           <li class="sidebar-list-item">
               <a href="{{ route('admin.testimonial') }}" class="sidebar-link text-muted {{request()->routeIs('admin.testimonial*') ? 'active' : '' }}">
                   <i class="fas fa-quote-left mr-3 text-gray"></i><span>Testimonial</span>
               </a>
           </li>

            <li class="sidebar-list-item">
                <a href="{{ route('admin.gallery') }}" class="sidebar-link text-muted {{request()->routeIs('admin.gallery*') ? 'active' : '' }}">
                    <i class="fas fa-image mr-3 text-gray"></i><span>Gallery</span>
                </a>
            </li>


      </ul>



</div>
