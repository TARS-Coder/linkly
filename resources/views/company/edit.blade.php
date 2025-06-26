<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
</div>
<x-app-layout>
    <x-slot name="header">
        <p class="text-[#101518] tracking-light text-[32px] font-bold leading-tight min-w-72">{{ __('Edit Company') }}</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
        <div class="px-40 flex flex-1 justify-left py-5">
         <form action="{{ route("company.update", $company)}}" method="post" class="w-full">
            @csrf
            @method('PUT')
          <div class="layout-content-container flex flex-col py-2 flex-1 w-full">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <div class="flex min-w-72 flex-col gap-1">
                <p class="text-[#121416] tracking-light text-[32px] font-bold leading-tight">Company Details</p>
                <p class="text-[#6a7681] text-sm font-normal leading-normal">Update company's information</p>
              </div>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">Company Name</p>
                <input type="text" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-white focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="name" value="{{ $company->name }}"
                />
              </label>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">Company Email</p>
                <input type="email" oninput="this.value = this.value.toLowerCase()" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-white focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="email" value="{{ $company->email }}"
                />
              </label>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">Description</p>
                <textarea
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-white focus:border-[#dde1e3] min-h-36 placeholder:text-[#6a7681] p-[5px] text-base font-normal leading-normal"
                  name="desc" placeholder="Enter description here">
                  {{ $company->desc }}
                </textarea>
              </label>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">Admin Name
                <input type="text" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-white focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="admin_name" value="{{ $company->users[0]->name ?? ""}}" placeholder="Add Admin Name"
                />
              </label>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">Admin Email</p>
                <input type="email" oninput="this.value = this.value.toLowerCase()" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-white focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="admin_email" value="{{$company->users[0]->email ?? ""}}" placeholder="Add Admin Email"
                  onchange="if(!confirm('A new invite will be send.\nAre you sure?')) this.value = this.defaultValue;"/>
              </label>
            </div>
            <div class="flex rounded-md shadow-sm justify-center py-2" role="group">
                <input type="radio" name="is_active" value="1" id="active" class="sr-only peer/active" {{ $company->is_active ? 'checked' : '' }}>
                <label for="active"
                  class="cursor-pointer px-4 py-2 text-sm font-medium rounded-l-md border border-gray-300 
                         peer-checked/active:bg-green-500 peer-checked/active:text-white bg-white text-gray-700">
                  Active
                </label>
            
                <input type="radio" name="is_active" value="0" id="inactive" class="sr-only peer/inactive" {{ $company->is_active ? '' : 'checked' }}>
                <label for="inactive"
                  class="cursor-pointer px-4 py-2 text-sm font-medium rounded-r-md border border-gray-300 
                         peer-checked/inactive:bg-gray-400 peer-checked/inactive:text-white bg-white text-gray-700">
                  Inactive
                </label>
              </div>            
            <div class="flex justify-stretch">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-end">
                <button class="flex min-w-[84px] max-w-[600px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#dce8f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Update</span>
                </button>
                <a href="{{route('company.index')}}" aria-roledescription="" class="flex min-w-[84px] max-w-[600px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f1f2f4] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em]">
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