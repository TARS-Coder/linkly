<div>
    <!-- Be present above all else. - Naval Ravikant -->
</div>
<x-app-layout>
    <x-slot name="header">
        <p class="text-[#101518] tracking-light text-[32px] font-bold leading-tight min-w-72">{{ __('Invite New User') }}</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
        <div class="px-40 flex flex-1 justify-left py-5">
         <form action="{{ route("admin.myproject.store")}}" method="post" class="w-full">
            @csrf   
          <div class="layout-content-container flex flex-col py-2 flex-1 w-full">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <div class="flex min-w-72 flex-col gap-1">
                <p class="text-[#121416] tracking-light text-[32px] font-bold leading-tight">New User Details</p>
                <p class="text-[#6a7681] text-sm font-normal leading-normal">Add new User's information</p>
              </div>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">User Name</p>
                <input type="text" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-white focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="name" placeholder="Add user name" required
                />
              </label>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">User Email</p>
                <input type="email" oninput="this.value = this.value.toLowerCase()" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-white focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="email" placeholder="Add email address to invite user" required />
              </label>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-start gap-4 px-4 justify-start">
            <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2 text-left">User Type</p>
                <div class="flex gap-2 justify-start">
                <!-- Admin -->
                <input type="radio" name="role" value="admin" id="role-admin" class="sr-only peer/role-admin" checked>
                <label for="role-admin"
                    class="peer-checked/role-admin:bg-indigo-600 peer-checked/role-admin:text-white
                        px-4 py-2 text-sm font-medium cursor-pointer rounded-md border border-indigo-600
                        text-indigo-600 bg-white hover:bg-indigo-50 transition-all duration-200 shadow-sm">
                    🛠 Admin
                </label>

                <!-- Member -->
                <input type="radio" name="role" value="member" id="role-member" class="sr-only peer/role-member">
                <label for="role-member"
                    class="peer-checked/role-member:bg-gray-800 peer-checked/role-member:text-white
                        px-4 py-2 text-sm font-medium cursor-pointer rounded-md border border-gray-800
                        text-gray-800 bg-white hover:bg-gray-100 transition-all duration-200 shadow-sm">
                    👤 Member
                </label>
                </div>
            </label>
            </div>
            <div class="flex rounded-md shadow-sm justify-center py-2" role="group">
                <input type="radio" name="is_active" value="1" id="active" class="sr-only peer/active" checked>
                <label for="active"
                  class="cursor-pointer px-4 py-2 text-sm font-medium rounded-l-md border border-gray-300 
                         peer-checked/active:bg-green-500 peer-checked/active:text-white bg-white text-gray-700">
                  Active
                </label>
            
                <input type="radio" name="is_active" value="0" id="inactive" class="sr-only peer/inactive">
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
                  <span class="truncate">Send Invitation</span>
                </button>
                <a href="{{route('admin.myproject.index')}}" aria-roledescription="" class="flex min-w-[84px] max-w-[600px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f1f2f4] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em]">
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