<x-app-layout>
    <x-slot name="header">
        <p class="text-[#101518] tracking-light text-[32px] font-bold leading-tight min-w-72">{{ __('All Users') }}</p>
    </x-slot>
    <x-slot name="newnode">
        <a href="{{route('admin.myproject.new')}}" class="flex min-w-[84px] max-w-[480px] items-center text-center overflow-hidden rounded-full h-8 px-4 bg-[#eaedf1] text-[#101518] text-ms font-medium leading-normal">
            <span class="truncate">{{ __('Add New Admin/Member')}}</span>
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
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Verified</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Type</th>
                      <th class="text-center w-[200px] text-sm font-medium leading-normal">Status</th>
                      <th class="text-center w-[300px] text-sm font-medium leading-normal ju">Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      @if ($user->id == auth()->id())
                        @continue
                      @endif
                    <tr class="border-t border-t-[#dde1e3]">
                      <td class="h-[48px] text-center text-[#121416] text-sm font-normal leading-normal">
                        {{ $user->name }}
                      </td>
                      <td class="text-center text-[#121416] text-sm font-normal leading-normal">
                        {{ $user->email }}
                      </td>
                      <td class="text-center text-[#6a7681] text-sm font-normal leading-normal">
                        {{ ($user->invite_token) ? "Pending" : "Verified"  }}
                      </td>
                      <td class="text-center text-[#6a7681] text-sm font-normal leading-normal">
                        {{ ($user->role)  }}
                      </td>
                      <td class="text-center text-sm font-normal leading-normal">
                        <a class="flex items-center justify-center min-w-[84px] max-w-[480px] overflow-hidden rounded-full h-8 px-4 {{ $user->is_active ? "bg-green-400" : "bg-[#eaedf1]" }} text-[#121416] text-sm font-medium leading-normal">
                          <span class="truncate">{{ $user->is_active ? "Active" : "Inactive" }}</span>
                      </a>
                      </td>
                      <td class="text-center text-[#6a7681] text-sm font-bold leading-normal tracking-[0.015em]">
                    <x-nav-link :href="route('admin.myproject.show', $user)">
                        {{ __("View") }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.myproject.edit', $user)">
                        {{ __("Edit") }}
                    </x-nav-link>
                      <form action="{{ route('admin.myproject.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this User?');" class="inline">
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
            </div>
        </div>
    </div>
      <div class="p-6">
            {{ $users->links() }}
        </div>
</x-app-layout>