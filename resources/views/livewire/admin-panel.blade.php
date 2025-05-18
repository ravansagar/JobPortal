<div class="w-[100vw] flex overflow-hidden">
    <div class="w-60 h-[90vh] bg-white border-r border-gray-200 p-4 flex flex-col justify-between text-sm font-semibold text-gray-800">
        <div>
            <nav class="space-y-1">
                <button wire:click="allJobs"
                    class="w-full flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ $showJobs ? 'bg-gray-200' : '' }}">
                    <span>
                        <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"
                            class="h-[24px] w-[24px]">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd"
                                    d="M5.508 2.466L4.356 5H2.5A1.5 1.5 0 001 6.5v1.882l.503.251a19 19 0 0016.994 0L19 8.382V6.5A1.5 1.5 0 0017.5 5h-1.856l-1.152-2.534A2.5 2.5 0 0012.216 1H7.784a2.5 2.5 0 00-2.276 1.466zM7.784 3a.5.5 0 00-.455.293L6.553 5h6.894l-.776-1.707A.5.5 0 0012.216 3H7.784z"
                                    fill="#1f1f1f"></path>
                                <path
                                    d="M19 10.613a20.986 20.986 0 01-8 2.003V14a1 1 0 01-2 0v-1.384c-2.74-.131-5.46-.798-8-2.003V17.5A1.5 1.5 0 002.5 19h15a1.5 1.5 0 001.5-1.5v-6.887z"
                                    fill="#1f1f1f"></path>
                            </g>
                        </svg>
                    </span>
                    <span>All Jobs</span>
                </button>
                <button wire:click="allComp"
                    class="w-full flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ $showComp ? 'bg-gray-200' : '' }}">
                    <span>
                        <svg class="h-[24px] w-[24px]" fill="#000000" viewBox="0 0 50 50"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M8 2L8 6L4 6L4 48L15 48L15 39L19 39L19 48L30 48L30 6L26 6L26 2 Z M 10 10L12 10L12 12L10 12 Z M 14 10L16 10L16 12L14 12 Z M 18 10L20 10L20 12L18 12 Z M 22 10L24 10L24 12L22 12 Z M 32 14L32 18L34 18L34 20L32 20L32 22L34 22L34 24L32 24L32 26L34 26L34 28L32 28L32 30L34 30L34 32L32 32L32 34L34 34L34 36L32 36L32 38L34 38L34 40L32 40L32 42L34 42L34 44L32 44L32 48L46 48L46 14 Z M 10 15L12 15L12 19L10 19 Z M 14 15L16 15L16 19L14 19 Z M 18 15L20 15L20 19L18 19 Z M 22 15L24 15L24 19L22 19 Z M 36 18L38 18L38 20L36 20 Z M 40 18L42 18L42 20L40 20 Z M 10 21L12 21L12 25L10 25 Z M 14 21L16 21L16 25L14 25 Z M 18 21L20 21L20 25L18 25 Z M 22 21L24 21L24 25L22 25 Z M 36 22L38 22L38 24L36 24 Z M 40 22L42 22L42 24L40 24 Z M 36 26L38 26L38 28L36 28 Z M 40 26L42 26L42 28L40 28 Z M 10 27L12 27L12 31L10 31 Z M 14 27L16 27L16 31L14 31 Z M 18 27L20 27L20 31L18 31 Z M 22 27L24 27L24 31L22 31 Z M 36 30L38 30L38 32L36 32 Z M 40 30L42 30L42 32L40 32 Z M 10 33L12 33L12 37L10 37 Z M 14 33L16 33L16 37L14 37 Z M 18 33L20 33L20 37L18 37 Z M 22 33L24 33L24 37L22 37 Z M 36 34L38 34L38 36L36 36 Z M 40 34L42 34L42 36L40 36 Z M 36 38L38 38L38 40L36 40 Z M 40 38L42 38L42 40L40 40 Z M 10 39L12 39L12 44L10 44 Z M 22 39L24 39L24 44L22 44 Z M 36 42L38 42L38 44L36 44 Z M 40 42L42 42L42 44L40 44Z">
                                </path>
                            </g>
                        </svg>
                    </span>
                    <span>Companies</span>
                </button>
                <button wire:click="allTags"
                    class="w-full flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ $showTags ? 'bg-gray-200' : '' }}">
                    <span>
                        <svg class="h-[24px] w-[24px]" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g clip-path="url(#clip0_429_11052)">
                                    <circle cx="17" cy="7" r="3" stroke="#292929" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round"></circle>
                                    <circle cx="7" cy="17" r="3" stroke="#292929" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round"></circle>
                                    <path
                                        d="M14 14H20V19C20 19.5523 19.5523 20 19 20H15C14.4477 20 14 19.5523 14 19V14Z"
                                        stroke="#292929" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                    <path d="M4 4H10V9C10 9.55228 9.55228 10 9 10H5C4.44772 10 4 9.55228 4 9V4Z"
                                        stroke="#292929" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_429_11052">
                                        <rect width="24" height="24" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </g>
                        </svg>
                    </span>
                    <span>Categories</span>
                </button>
                <hr class="my-2">
                <button wire:click="allUsers"
                    class="w-full flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ $showUsers ? 'bg-gray-200' : '' }}">
                    <span><svg class="h-[24px] w-[24px]" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <circle cx="9.00098" cy="6" r="4" fill="#1C274C"></circle>
                                <ellipse cx="9.00098" cy="17.001" rx="7" ry="4" fill="#1C274C"></ellipse>
                                <path
                                    d="M20.9996 17.0005C20.9996 18.6573 18.9641 20.0004 16.4788 20.0004C17.211 19.2001 17.7145 18.1955 17.7145 17.0018C17.7145 15.8068 17.2098 14.8013 16.4762 14.0005C18.9615 14.0005 20.9996 15.3436 20.9996 17.0005Z"
                                    fill="#1C274C"></path>
                                <path
                                    d="M17.9996 6.00073C17.9996 7.65759 16.6565 9.00073 14.9996 9.00073C14.6383 9.00073 14.292 8.93687 13.9712 8.81981C14.4443 7.98772 14.7145 7.02522 14.7145 5.99962C14.7145 4.97477 14.4447 4.01294 13.9722 3.18127C14.2927 3.06446 14.6387 3.00073 14.9996 3.00073C16.6565 3.00073 17.9996 4.34388 17.9996 6.00073Z"
                                    fill="#000000"></path>
                            </g>
                        </svg></span>
                    <span>Users</span>
                </button>
                <button wire:click="allAgents"
                    class="w-full flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ $showAgents ? 'bg-gray-200' : '' }}">
                    <span><svg height="24px" width="24px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                            fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <style type="text/css">
                                    .st0 {
                                        fill: #000000;
                                    }
                                </style>
                                <g>
                                    <path class="st0"
                                        d="M441.479,402.522c-12.527-18.759-31.554-29.133-49.435-35.873c-8.968-3.374-17.731-5.862-25.452-7.974 c-7.706-2.098-14.412-3.867-18.917-5.561c-7.878-2.928-16.202-6.719-22.01-10.799c-2.9-2.022-5.135-4.107-6.431-5.883 c-1.31-1.816-1.666-3.072-1.68-4.168c0-7.576,0-17.045,0-29.517c10.08-11.218,24.56-28.598,30.512-56.154 c2.078-0.933,4.135-1.996,6.116-3.374c4.93-3.401,9.113-8.344,12.658-15.064c3.565-6.747,6.726-15.373,10.099-27.172 c1.708-5.979,2.496-11.176,2.496-15.804c0.007-5.334-1.09-9.963-3.106-13.72c-1.241-2.345-2.839-4.162-4.518-5.705 c3.394-25.404,9.057-92.357-21.68-111.308c5.869-14.419,5.787-29.73-6.781-42.298c-10.786-3.593-35.935-3.593-55.702-8.988 C267.879-2.238,178.038-7.62,151.085,49.879c-26.59,7.089-31.327,115.127-13.734,119.276c-0.555,0.775-1.2,1.412-1.673,2.304 c-2.016,3.757-3.119,8.385-3.112,13.72c0.007,4.628,0.796,9.825,2.502,15.804c4.512,15.714,8.585,25.863,13.858,33.309 c2.633,3.696,5.636,6.664,8.899,8.927c1.982,1.378,4.038,2.44,6.116,3.374c5.952,27.556,20.432,44.937,30.511,56.154 c0,12.472,0,21.941,0,29.517c0,0.932-0.37,2.276-1.817,4.196c-2.118,2.852-6.514,6.308-11.732,9.236 c-5.204,2.962-11.19,5.526-16.428,7.371c-6.15,2.18-16.058,4.45-27.159,7.631c-16.681,4.827-36.401,11.773-52.445,25.534 c-8.008,6.877-15.043,15.516-19.987,26.254c-4.95,10.73-7.788,23.484-7.782,38.403c0,3.463,0.151,7.042,0.466,10.744 c0.227,2.598,1.214,4.703,2.372,6.438c2.208,3.25,5.136,5.656,8.804,8.132c6.425,4.25,15.325,8.406,26.72,12.486 c34.104,12.163,90.568,23.299,160.538,23.312c56.848,0,104.83-7.378,139.078-16.648c17.135-4.642,30.813-9.729,40.7-14.81 c4.95-2.557,8.954-5.087,12.129-7.857c1.591-1.398,2.982-2.866,4.155-4.614c1.152-1.735,2.146-3.84,2.372-6.438 c0.309-3.696,0.46-7.268,0.46-10.717C454.925,431.025,449.816,414.994,441.479,402.522z M166.156,141.255l26.253-37.471 c14.379,5.389,91.638,7.185,114.998-3.593c4.779-2.208,10.388-5.938,16.024-10.703c2.249,2.187,3.744,3.518,3.744,3.518 l11.025,69.456l-76.807,9.606l-2.153,7.185h-6.473l-2.152-7.185l-84.658-10.586L166.156,141.255z M178.175,239.646l-0.782-4.422 l-4.223-1.508c-2.688-0.96-4.738-1.94-6.528-3.182c-2.64-1.865-5.033-4.409-7.83-9.62c-2.763-5.184-5.691-12.932-8.893-24.17 c-1.406-4.909-1.906-8.728-1.906-11.566c0.007-3.292,0.637-5.218,1.282-6.431c0.274-0.501,0.582-0.905,0.905-1.255l2.256,0.377 c8.296,9.365,13.117,23.065,13.117,23.065l0.206-20.844l5.773,0.96l12.575,28.749l48.517,3.592l21.564-21.564h3.593l21.564,21.564 l48.516-3.592l12.576-28.749l0.678-0.116l4.011,25.273l7.2-27.138l9.462-1.577c0.315,0.356,0.617,0.733,0.898,1.255 c0.652,1.213,1.275,3.14,1.289,6.431c0,2.839-0.501,6.658-1.906,11.566c-4.258,15.003-8.077,23.724-11.58,28.565 c-1.755,2.447-3.36,3.976-5.142,5.224c-1.79,1.241-3.84,2.221-6.527,3.182l-4.224,1.508l-0.782,4.422 c-4.943,27.68-19.205,43.244-29.737,54.976l-1.981,2.208v2.962c0,6.13,0,11.423,0,16.25l-44.705,25.547l-47.515-27.145 c0-4.423,0-9.174,0-14.652v-2.962l-1.982-2.208C197.38,282.89,183.119,267.326,178.175,239.646z M235.016,420.781l-56.394-56.764 c5.45-2.386,11.018-5.246,16.002-8.708c3.902-2.728,7.474-5.786,10.312-9.51c2.804-3.675,4.958-8.276,4.958-13.534 c0-1.529,0-3.208,0-4.889l33.274,19.02l-8.796,18.732l9.016,11.868L235.016,420.781z M256.003,495.236 c-4.443,0-8.056-3.6-8.056-8.05c0-4.45,3.613-8.056,8.056-8.056c4.45,0,8.05,3.606,8.05,8.056 C264.053,491.636,260.453,495.236,256.003,495.236z M256.003,456.044c-4.443,0-8.056-3.6-8.056-8.05 c0-4.443,3.613-8.057,8.056-8.057c4.45,0,8.05,3.614,8.05,8.057C264.053,452.444,260.453,456.044,256.003,456.044z M279.069,418.807l-8.194-41.811l9.024-11.868l-8.626-18.52l30.841-17.628c0,1.097,0,2.256,0,3.284 c-0.014,5.094,1.968,9.668,4.676,13.322c4.114,5.512,9.819,9.592,16.03,13.158c3.415,1.941,7.001,3.648,10.607,5.231 L279.069,418.807z">
                                    </path>
                                </g>
                            </g>
                        </svg></span>
                    <span>Agents</span>
                </button>
            </nav>
        </div>


        <button wire:click="logout" class="w-full flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-red-100 text-red-600">
            <svg class="h-[24px] w-[24px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1" />
            </svg>
            <span>Logout</span>
        </button>
    </div>

    <div class="max-w-[90vw] overflow-hidden flex-1 px-8">
        <div class="flex max-w-[50vw] mx-auto mt-3 justify-center">
            <input type="text"  placeholder="Search by name..." wire:model.live.debounce.50="search"
                class="w-full border bg-white/30 border-gray-500 rounded-l-full px-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button class="bg-gray-100 border border-l-0 border-gray-300 rounded-r-full px-4">
                <svg class="h-[20px] w-[20px]" fill="#000000" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91 2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48 0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z"
                            fill-rule="evenodd"></path>
                    </g>
                </svg>
            </button>
        </div>
        @if($showJobs)
            @livewire('volt.jobtable')
        @endif
        @if($showComp)
            @livewire('volt.companytable')
        @endif
        @if($showTags)
            @livewire('volt.tagtable')
        @endif
        @if($showUsers)
            @livewire('volt.userstable')
        @endif
        @if($showAgents)
            @livewire('volt.agentstable')
        @endif
    </div>
</div>