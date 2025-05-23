<div class="bg-gray-200 w-[100vw] p-2">
    <div class="flex justify-between items-center">

        <div class="w-1/4 flex ml-15  justify-start">
            <a href="/" class="text-white font-bold text-xl">
                <svg height="50px" width="60px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 392.663 392.663" xml:space="preserve">
                    <polygon style="fill:#56ACE0;"
                        points="167.758,310.432 147.588,350.901 244.945,350.901 224.776,310.432 " />
                    <path style="fill:#FFFFFF;" d="M360.986,41.762H31.547c-5.301,0-9.632,4.331-9.632,9.632v227.556c0,5.301,4.331,9.632,9.632,9.632
	h329.568c5.301,0,9.632-4.331,9.632-9.632V51.394C370.747,46.093,366.416,41.762,360.986,41.762z" />
                    <path style="fill:#194F82;" d="M360.986,19.911H31.547C14.158,19.911,0,34.069,0,51.459v227.556
	c0,17.39,14.158,31.547,31.547,31.547h111.903l-23.208,46.416c-3.62,7.24,1.616,15.774,9.762,15.774h132.655
	c8.145,0,13.382-8.469,9.762-15.774l-23.208-46.416h111.903c17.39,0,31.547-14.158,31.547-31.547V51.459
	C392.533,34.069,378.376,19.911,360.986,19.911z M370.747,279.014c0,5.301-4.331,9.632-9.632,9.632H31.547
	c-5.301,0-9.632-4.331-9.632-9.632V51.459c0-5.301,4.331-9.632,9.632-9.632h329.568c5.301,0,9.632,4.331,9.632,9.632V279.014z
	 M147.588,350.901l20.17-40.404h57.018l20.17,40.404H147.588z" />
                    <path style="fill:#FFC10D;" d="M338.036,63.547H54.562c-6.012,0-10.925,4.848-10.925,10.925v1.422h25.277
	c6.012,0,10.925,4.848,10.925,10.925c0,6.077-4.848,10.925-10.925,10.925H43.636v18.941h1.616c6.012,0,10.925,4.848,10.925,10.925
	c0,6.012-4.848,10.925-10.796,10.925h-1.681v117.592c0,6.012,4.848,10.925,10.925,10.925h283.539
	c6.012,0,10.925-4.848,10.925-10.925V74.473C349.026,68.461,344.048,63.547,338.036,63.547z" />
                    <circle style="fill:#FFFFFF;" cx="188.38" cy="164.978" r="27.927" />
                    <g>
                        <path style="fill:#194F82;" d="M230.529,191.03c4.719-7.564,7.434-16.485,7.434-26.053c0-27.345-22.174-49.519-49.519-49.519
		s-49.519,22.174-49.519,49.519c0,27.345,22.174,49.519,49.519,49.519c9.891,0,19.071-2.909,26.828-7.952l41.051,41.051
		c4.267,4.267,11.119,4.267,15.451,0c4.267-4.202,4.267-11.055,0-15.386L230.529,191.03z M188.38,192.84
		c-15.386,0-27.927-12.412-27.927-27.927c0-15.386,12.541-27.927,27.927-27.927s27.927,12.541,27.927,27.927
		C216.307,180.364,203.766,192.84,188.38,192.84z" />
                        <path style="fill:#194F82;" d="M74.667,136.598h27.604v43.636c0,11.766-7.758,13.576-10.667,13.576
		c-6.077,0-11.96-3.038-17.519-9.051l-10.796,14.933c8.339,8.598,18.101,12.929,29.285,12.929c8.986,0,30.578-3.297,30.578-33.164
		V118.82h-48.42v17.778H74.667z" />
                        <path style="fill:#194F82;" d="M335.386,186.053c-0.259-19.523-19.006-22.497-19.006-22.497s13.77-3.232,13.77-20.17
		c0-26.893-32.905-24.63-32.905-24.63h-36.331v93.22h40.792C337.002,213.01,335.386,186.053,335.386,186.053z M281.665,136.339
		h0.065h9.956c6.723,0.323,17.131-0.84,16.937,10.214c0,5.43-1.228,9.891-17.067,9.891h-9.891L281.665,136.339L281.665,136.339z
		 M295.952,194.327h-14.287v-21.463h12.283c8.275,0.388,20.105-0.453,19.846,10.602C313.859,187.733,313.277,194.65,295.952,194.327
		z" />
                    </g>
                </svg>
            </a>
        </div>

        <div class="w-1/2 flex justify-center space-x-4 text-gray-800">
            @foreach($navLinks as $link)
                @if(Auth::user()?->role == 'user')
                    @if($link['name'] === 'Applied Jobs')
                        <a href="{{ $link['url'] }}"
                            class="text-xl font-bold px-4 {{ $link['active'] ? 'border-b-2 border-blue-500' : '' }}">
                            {{ $link['name'] }}
                        </a>
                    @endif
                @endif
                @if(Auth::user()?->role == 'agent')
                    @if($link['name'] === 'MyJobs')
                        <a href="{{ $link['url'] }}"
                            class="text-xl font-bold px-4 {{ $link['active'] ? 'border-b-2 border-blue-500' : '' }}">
                            {{ $link['name'] }}
                        </a>
                    @endif
                @endif

                @if(Auth::user()?->role == 'admin')
                    @if($link['name'] === 'Admin Dashboard')
                        <a href="{{ $link['url'] }}"
                            class="text-xl font-bold px-4 {{ $link['active'] ? 'border-b-2 border-blue-500' : '' }}">
                            {{ $link['name'] }}
                        </a>
                    @endif
                @endif
                @if($link['name'] != 'MyJobs' && $link['name'] != 'Admin Dashboard' && $link['name'] != 'Applied Jobs')
                    <a href="{{ $link['url'] }}"
                        class="text-xl font-bold px-4 {{ $link['active'] ? 'border-b-2 border-blue-500' : '' }}">
                        {{ $link['name'] }}
                    </a>
                @endif
            @endforeach
        </div>
        
        <div class="w-1/4 mx-auto flex justify-end mr-6">
            @guest
                @livewire('search-bar')
                @foreach ($startUp as $link)
                    <a href="{{ $link['url'] }}"
                        class="text-l font-medium  rounded px-4 mx-4 py-1 hover:text-white ring ring-blue-500 hover:bg-blue-500">
                        {{ $link['name'] }}
                    </a>
                @endforeach
            @endguest
            @auth
            <div class="flex items-center justify-end space-x-4 w-full relative z-1000 pr-8">
                    @if(request()->routeIs('home') && (Auth()->user() != null))
                        @livewire('search-bar')
                    @endif
                    @livewire('profile-dropdown')
                </div>
            @endauth

        </div>
    </div>
</div>