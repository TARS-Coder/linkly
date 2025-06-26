<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
</div>
<x-app-layout>
    <x-slot name="header">
        <p class="text-[#101518] tracking-light text-[32px] font-bold leading-tight min-w-72">{{ __('Details') }}</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col py-5 flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-3">
              <div class="flex min-w-72 flex-col gap-3">
                <p class="text-[#121416] tracking-light text-[28px] font-bold leading-tight">Company Details</p>
                <p class="text-[#6a7681] text-sm font-normal leading-normal">Company's information</p>
              </div>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal">Company Name:</p>
                <p class="text-base font-small pb-2">{{ $company->name}}</p>
              </label>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal">Company Email:</p>
                <p class="text-[#121416] text-base font-small leading-normal pb-2">{{ $company->email}}</p>
              </label>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4">
              <label class="flex flex-col min-w-40 flex-1">
                <p class="text-[#121416] text-base font-medium leading-normal">Description</p>
                <p class="text-[#121416] text-base font-small leading-normal pb-2">{{ $company->desc}}</p>
              </label>
            </div>
            <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 justify-end">
                <a class="flex min-w-[84px] max-w-[480px] items-center justify-center overflow-hidden rounded-full h-8 px-4 {{ $company->is_active ? "bg-green-400" : "bg-[#eaedf1]" }} text-[#121416] text-sm font-medium leading-normal"
                        >
                    <span class="truncate">{{ $company->is_active ? "Active" : "Inactive" }}</span>
                </a>
            </div>
          </div>
          <div class="layout-content-container flex flex-col py-5 flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-3">
              <div class="flex min-w-72 flex-col gap-3">
                <p class="text-[#121416] tracking-light text-[24px] font-bold leading-tight">Admins</p>
                <p class="text-[#6a7681] text-sm font-normal leading-normal">Admin's assined to Company</p>
                @foreach ($company->users as $user)
                  @if ($user->role == 'member')
                    @continue
                  @endif
                <a class="flex min-w-[84px] max-w-[480px] items-center justify-center overflow-hidden rounded-full h-8 px-4 bg-[#eaedf1] text-[#121416] text-lg font-medium leading-normal"
                        >
                    <span class="truncate">{{ $user->name }}</span>
                    <span class="truncate px-5 text-sm">{{ $user->email }}</span>
                </a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="px-40 flex flex-1 justify-strech py-5">
              <div class="flex flex-1 gap-3 flex-wrap px-4 py-3 justify-end">
                <a href="{{route('company.index')}}" aria-roledescription="" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#dce8f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em]">
                  <span class="truncate">Get Back</span>
                </a>
              </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>