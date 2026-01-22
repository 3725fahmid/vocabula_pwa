 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->

                    @php
                        $id = Auth::user()->id;
                        $userData = App\Models\User::find($id);
                        @endphp
                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="{{ (!empty($userData->profile_image))? url('upload/user_images/'.$userData->profile_image):url('upload/no_image.jpg') }}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">{{$userData->first_name}}</h4>
                            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            {{-- <li class="menu-title">Menu</li> --}}

                            <li>
                                <a href="{{route('home')}}" class="waves-effect">
                                    <i class="ri-home-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                                    <span>Homepage</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{url('account')}}" class="waves-effect">
                                    <i class="ri-bank-line"></i>
                                    <span>Account</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{url('category')}}" class="waves-effect">
                                    <i class="ri-book-line"></i>
                                    <span>Category</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-coin-line"></i>
                                    <span>Expense</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="{{url('expense')}}">All Expense</a></li>
                                    <li><a href="{{url('expensefilter')}}">Expense Filter</a></li>
                                    <li><a href="{{url('expense/create')}}">Add New</a></li>
                                </ul>
                            </li>

                            {{-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-file-edit-fill"></i>
                                    <span>Posts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{url('posts')}}">All Posts</a></li>
                                    <li><a href="{{url('posts/create')}}">Add New</a></li>
                                    <li><a href="{{url('post-categories')}}">Categories</a></li>
                                    <li><a href="{{url('post-tags')}}">Tags</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li>
                                <a href="#" class=" waves-effect">
                                    <i class="ri-file-edit-fill"></i>
                                    <span>Comments</span>
                                </a>
                            </li> --}}

                            {{-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Contacts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="#">All Contacts</a></li>
                                    <li><a href="#">Add New</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{url('calender')}}" class="waves-effect">
                                    <i class="ri-calendar-2-line"></i>
                                    <span>Calender</span>
                                </a>
                            </li> --}}

                            <li>
                                <a href="{{url('setting')}}" class="waves-effect">
                                    <i class="ri-settings-2-line align-middle me-1"></i>
                                    <span>Settings</span>
                                </a>
                            </li>

                            {{-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Users</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{url('users')}}">All Users</a></li>
                                    <li><a href="{{url('modules')}}">Modules</a></li>
                                    <li><a href="{{url('permissions')}}">Permissions</a></li>
                                    <li><a href="{{url('roles')}}">Roles</a></li>

                                </ul>
                            </li> --}}
                            <li class="position-absolute bottom-0 start-0 w-100 d-flex justify-content-between align-items-center">
                                <a href="{{url('expense/create')}}" class="expense_btn">
                                    <i class="ri-add-box-line"></i>
                                   <span>Add Expense</span>
                                </a>
                            </li>
                        </ul>
                        {{-- <div class="position-absolute bottom-0 start-0 w-100 d-flex justify-content-between align-items-center">
                            <a href="{{url('expense/create')}}" class="expense_btn w-100">
                                <span class="text-center d-flex align-item-center justify-content-center">
                                    Add Expenses 
                                    <i class="px-2 ri-add-line"></i>
                                </span>
                            </a>
                        </div> --}}
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
