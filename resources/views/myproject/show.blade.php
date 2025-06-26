<x-app-layout>
    <x-slot name="header">
        <p class="text-[#101518] tracking-light text-[32px] font-bold leading-tight min-w-72">{{ __('User Details') }}</p>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
        <div class="px-40 flex flex-1 justify-left py-5">
          <div class="layout-content-container flex flex-col py-2 flex-1 w-full">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <div class="flex min-w-72 flex-col gap-1">
                <p class="text-[#121416] tracking-light text-[32px] font-bold leading-tight">User Details</p>
                <p class="text-[#6a7681] text-sm font-normal leading-normal">User's information</p>
              </div>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">User Name</p>
                <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-gray-100 focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="name" value="{{$user->name}}" disabled required />
              </label>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2">User Email</p>
                <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#121416] focus:outline-0 focus:ring-0 border border-[#dde1e3] bg-gray-100 focus:border-[#dde1e3] h-14 placeholder:text-[#6a7681] p-[15px] text-base font-normal leading-normal"
                  name="email" value="{{$user->email}}" disabled required />
              </label>
            </div>
            <div class="flex max-w-[600px] flex-wrap items-start gap-4 px-4 justify-start">
            <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal pb-2 text-left">User Type</p>
                <div class="flex gap-2 justify-start">
                <!-- Member -->
                <input type="radio" name="role" id="role-member" class="sr-only peer/role-member" disabled>
                <label for="role-member"
                    class="peer-checked/role-member:bg-gray-800 peer-checked/role-member:text-white
                        px-4 py-2 text-sm font-medium cursor-pointer rounded-md border border-gray-800
                        text-gray-800 bg-white hover:bg-gray-100 transition-all duration-200 shadow-sm">
                    {{ $user->role == 'admin' ? '🛠 Admin' : '👤 Member' }}
                    
                </label>
                </div>
            </label>
            </div>
            <div class="flex rounded-md shadow-sm justify-center py-2" role="group">
                <input type="radio" name="is_active" value="1" id="active" class="sr-only peer/active" checked disabled>
                <label for="active"
                  class="cursor-pointer px-4 py-2 text-sm font-medium rounded-md border border-gray-300 bg-gray-100 text-black ">
                  {{ $user->is_active ? 'Active' : 'Inactive' }}
                </label>
            </div>            
            <div class="flex justify-stretch">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-end">
                <a href="{{route('admin.myproject.index')}}" aria-roledescription="" class="flex min-w-[84px] max-w-[600px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#f1f2f4] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em]">
                  <span class="truncate">Go Back</span>
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