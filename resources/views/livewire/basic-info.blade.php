<div class="relative isolate overflow-hidden h-[30vh] bg-gray-900 w-[100vw] px-8 py-8 sm:py-8 ">
    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply"
        alt="" class="absolute inset-0 -z-10 size-full object-cover object-right w-[100vw] md:object-center">
    <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
        aria-hidden="true">
        <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>

    <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0"
        aria-hidden="true">
        <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>

    <div class=" max-w-7xl px-6 lg:px-8">
        <div class="max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-semibold tracking-tight text-white sm:text-2xl">Work through us</h2>
            <p class="mt-4 text-lg font-semibold text-gray-300 sm:text-lg">
                Easily find best and desired jobs according to your capability and apply for the job.
            </p>
        </div>

        <div class=" mt-4 max-w-2xl lg:mx-0 lg:max-w-none">
            <dl class="mt-4 grid grid-cols-1 gap-8 sm:mt-4 sm:grid-cols-2 lg:flex lg:justify-between">
                <div class="flex flex-col-reverse gap-1">
                    <dt class="text-base text-gray-300">Open Jobs</dt>
                    <dd class="text-xl font-semibold tracking-tight text-white">{{$job }}</dd>
                </div>
                <div class="flex flex-col-reverse gap-1">
                    <dt class="text-base text-gray-300">Categories</dt>
                    <dd class="text-xl font-semibold tracking-tight text-white">{{ $tag }}+</dd>
                </div>
                <div class="flex flex-col-reverse gap-1">
                    <dt class="text-base text-gray-300">Companies</dt>
                    <dd class="text-xl font-semibold tracking-tight text-white">{{ $company }}+</dd>
                </div>
                <div class="flex flex-col-reverse gap-1">
                    <dt class="text-base text-gray-300">Hours per week</dt>
                    <dd class="text-xl font-semibold tracking-tight text-white">40</dd>
                </div>
                <div class="flex flex-col-reverse gap-1">
                    <dt class="text-base text-gray-300">Paid time off</dt>
                    <dd class="text-xl font-semibold tracking-tight text-white">Unlimited</dd>
                </div>
            </dl>
        </div>
    </div>
</div>
