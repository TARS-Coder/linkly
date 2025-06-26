<x-app-layout>
    <x-slot name="header">
        <p class="text-[#101518] tracking-light text-[32px] font-bold leading-tight min-w-72">{{ __('Companies') }}</p>
    </x-slot>
    <x-slot name="newnode">
        <a href="{{route('company.new')}}" class="flex min-w-[84px] max-w-[480px] items-center justify-center overflow-hidden rounded-full h-8 px-4 bg-[#eaedf1] text-[#101518] text-ms font-medium leading-normal">
            <span class="truncate">{{ __('Add New Company')}}</span>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <div class="px-4 py-3">
              <div class="flex overflow-scroll rounded-xl border border-[#dde1e3] bg-white">
                <table class="flex-1">
                  <thead>
                    <tr class="bg-white">
                      <th class="h-[60px] text-center w-[200px] text-sm font-medium leading-normal">Name</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Email</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Description</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Status</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($companies as $company)
                    <tr class="border-t border-t-[#dde1e3]">
                      <td class="h-[48px] text-center w-[200px] text-[#121416] text-sm font-normal leading-normal">
                        {{ $company->name }}
                      </td>
                      <td class="text-center w-[200px] text-[#121416] text-sm font-normal leading-normal">
                        {{ $company->email }}
                      </td>
                      <td class="text-center w-[200px] text-[#6a7681] text-sm font-normal leading-normal">
                        {{ $company->desc }}
                      </td>
                      <td class="text-center w-[200px] px-10 text-sm font-normal leading-normal">
                        <a class="flex items-center justify-center min-w-[84px] max-w-[480px] overflow-hidden rounded-full h-8 px-4 {{ $company->is_active ? "bg-green-400" : "bg-[#eaedf1]" }} text-[#121416] text-sm font-medium leading-normal">
                          <span class="truncate">{{ $company->is_active ? "Active" : "Inactive" }}</span>
                      </a>
                      </td>
                      <td class="text-center w-[200px] text-[#6a7681] text-sm font-bold leading-normal tracking-[0.015em]">
                    <x-nav-link :href="route('company.show', $company)">
                        {{ __("View") }}
                    </x-nav-link>
                    <x-nav-link :href="route('company.edit', $company)">
                        {{ __("Edit") }}
                    </x-nav-link>
                      <form action="{{ route('company.destroy', $company) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');" class="inline">
                          @csrf
                          @method('DELETE')
                      
                          <button type="submit" class="text-red-500 hover:underline">
                              {{ __('Delete') }}
                          </button>
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
                </div>
              <div class="p-6">
                  {{ $companies->links() }}
              </div>
            </div>
        </div>
    </div>
</x-app-layout>