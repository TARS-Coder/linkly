<x-app-layout>
    <x-slot name="header">
        <p class="text-[#101518] tracking-light text-[32px] font-bold leading-tight min-w-72">{{ __('Creat New Short URL') }}</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
        <div class="px-40 flex flex-1 justify-left py-5">
         <form action="{{ route("url.store")}}" method="post" class="w-full">
            @csrf   
          <div class="layout-content-container flex flex-col py-2 flex-1 w-full">
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">Optional Title/Desc</p>
                <input type="text" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-white focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="title" placeholder="Google..."
                />
              </label>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">Paste Your URL here</p>
                <input type="url" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-white focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="original_url" placeholder="https://www.example.com/abc.." required
                />
              </label>
            </div>
            <div class="flex justify-stretch">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-end">
                <button class="flex min-w-[84px] max-w-[600px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#dce8f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Create</span>
                </button>
                <a href="{{route('url.index')}}" aria-roledescription="" class="flex min-w-[84px] max-w-[600px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f1f2f4] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em]">
                  <span class="truncate">Cancel</span>
                </a>
              </div>
            </div>
          </div>
         </form>
        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>