<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-center">
                @if ($user->role === "superadmin")
                    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                        <div class="flex flex-wrap justify-between gap-3 p-4">
                        <p class="text-[#121416] tracking-light text-[32px] font-bold leading-tight min-w-72">Welcome, {{ $user->name;}}</p>
                        </div>
                        <div class="flex flex-wrap gap-4 p-4">
                        <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-[#f1f2f4]">
                            <p class="text-[#121416] text-base font-medium leading-normal">Total Companies</p>
                            <p class="text-[#121416] tracking-light text-2xl font-bold leading-tight">{{$data["totalCompanies"]}}</p>
                        </div>
                        <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-[#f1f2f4]">
                            <p class="text-[#121416] text-base font-medium leading-normal">Total Users</p>
                            <p class="text-[#121416] tracking-light text-2xl font-bold leading-tight">{{$data["totalUsers"]}}</p>
                        </div>
                        <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-[#f1f2f4]">
                            <p class="text-[#121416] text-base font-medium leading-normal">Total Short URLs</p>
                            <p class="text-[#121416] tracking-light text-2xl font-bold leading-tight">{{$data["totalUrls"]}}</p>
                        </div>
                        </div>
                    </div>
                @endif
                @if ($user->role === "admin")
                    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                        <div class="flex flex-wrap justify-between gap-3 p-4">
                            <p class="text-[#121416] tracking-light text-[32px] font-bold leading-tight min-w-72">Welcome, {{$user->name;}}</p>
                        </div>
                        <div class="flex flex-wrap gap-4 p-4">
                            <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-[#f1f2f4]">
                                <p class="text-[#121416] text-base font-medium leading-normal">Co-Admins</p>
                                <p class="text-[#121416] tracking-light text-2xl font-bold leading-tight">{{$data["coadminCount"]-1}}</p>
                            </div>
                            <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-[#f1f2f4]">
                                <p class="text-[#121416] text-base font-medium leading-normal">Members</p>
                                <p class="text-[#121416] tracking-light text-2xl font-bold leading-tight">{{$data["memberCount"]}}</p>
                            </div>
                            <div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 bg-[#f1f2f4]">
                                <p class="text-[#121416] text-base font-medium leading-normal">URLs</p>
                                <p class="text-[#121416] tracking-light text-2xl font-bold leading-tight">{{$data["totalUrls"]}}</p>
                            </div>
                        </div>
                        <h2 class="text-[#121416] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Assigned Company</h2>
                        <div class="p-4">
                            <div class="flex items-stretch justify-between gap-4 rounded-xl bg-white p-4 shadow-[0_0_4px_rgba(0,0,0,0.1)]">
                                <div class="flex flex-col gap-1 flex-[2_2_0px] pt-8 items-center" >
                                <p class="text-[#121416] text-base font-bold leading-tight">{{$data["company"]->email}}</p>
                                <p class="text-[#6a7681] text-sm font-normal leading-normal">{{$data["company"]->name}}</p>
                                <p class="text-[#6a7681] text-sm font-normal leading-normal">{{$data["company"]->desc ?? ""}}</p>
                                </div>
                                <div
                                class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex-1"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBK2LGdJAerKa9kEin7IyzVIdh8qkjquYPKlmc95dFF2PEsCcQwXoK1mJ0oS61lpMZv_Nx4sgVR6r81phPIXFMBJ_WU6YRLqT2o92D6pu9tWe1rai02ij-HYhPj_tK_iCGq4e2d5rDmPLMgGdAaVxgLFE99GX7g3pJVWjUN23dKG_VXylkHJxsictpu4D71uVnljuxla5Gv114X2vSXSVsJTz0vMPYksU4JRmBEIIlpFTeqFvDcwkAkygV3RVxxR-JzHSJ7AZ2ncw");'
                                ></div>
                            </div>
                        </div>
                    </div>
                        @endif
                        @if ($user->role === 'member')
                            <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                                <div class="flex flex-wrap justify-between gap-3 p-4">
                                <div class="flex min-w-72 flex-col gap-3">
                                    <p class="text-[#121416] tracking-light text-[32px] font-bold leading-tight">Welcome back, {{$user->name}}</p>
                                </div>
                                </div>
                                <h2 class="text-[#121416] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Company Details</h2>
                                <div class="p-4">
                                <div class="flex items-stretch justify-between gap-4 rounded-xl">
                                    <div class="flex flex-col gap-1 flex-[2_2_0px] pt-8 items-center" >
                                    <p class="text-[#121416] text-base font-bold leading-tight">{{ $data["company"]->name}}</p>
                                    <p class="text-[#6a7681] text-sm font-normal leading-normal">{{ $data["company"]->email}}</p>
                                    </div>
                                    <div
                                    class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex-1"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCku_5tGJWjY4dOUV69M-Jw9L0oZg4VYZuuLqaBWbHYJKkvgMVlevMkZ3Lq3_00R7IFCHQeg4WEGQBOTa9PAdGWQ28JH2ROc60y6C5yOi7tRUQsyuGuQa6lQfnx6XnwclTzxO96L1gWfg_WaRMS_2GcAZepkuEvzBPgsZCau9aKr2k3sLVGaojY_lKUw-463VH6PQZcs25kYDuGvxjKssB4O0hOMXl7v_J_3h463YUpxz1AoqeLq1HNb8Bbd5rf-hmuKirYmNbJqw");'
                                    ></div>
                                </div>
                                </div>
                                <h2 class="text-[#121416] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Your Admin Contact</h2>
                                <div class="p-4">
                                <div class="flex items-stretch justify-between gap-4 rounded-xl">
                                    <div class="flex flex-col gap-1 flex-[2_2_0px] pt-8 items-center" >
                                    <p class="text-[#121416] text-base font-bold leading-tight">{{ $data["admin"]->name}}</p>
                                    <p class="text-[#6a7681] text-sm font-normal leading-normal">{{ $data["admin"]->email}}</p>
                                    </div>
                                    <div
                                    class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex-1"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAPNrHy0YzTWgLCsbcRTVeiTQZuLBovk01vuWCRov1SiTOfWgVlPtowB5xOUHKLtrXJ-H6hI5SsTz4NkO3SqY7B0xPNWB-mgpiSyO4vaxtxbMPyGfi9M-kM6a2pPBwnNVgnMNn1_tN7zxUiEg55orSqO80ZEWEmJUfYBYrJABLTI81rltrj64sDbWdDysnvRYzHKEjqvQieHpMJsaXke11fB1kZxJXImDqQenazhIEDuz0j0MCtobJJYRQ6EvDKQLIAum0kALb0kw");'
                                    ></div>
                                </div>
                                </div>
                                <h2 class="text-[#121416] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Your Activity</h2>
                                <div class="p-4">
                                <div class="flex items-stretch justify-between gap-4 rounded-xl">
                                    <div class="flex flex-col gap-1 flex-[2_2_0px] pt-8 items-center" >
                                    <p class="text-[#121416] text-base font-bold leading-tight">{{ $data["totalUrls"]}}</p>
                                    <p class="text-[#6a7681] text-sm font-normal leading-normal">URLs you have created</p>
                                    </div>
                                    <div
                                    class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl flex-1"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDmw23nED3GIdfynNx0EXtxzFSQEvLsFDr6XBvL4HaCw4PCuU1JhoEBWwmaz4bHO2owKCtidQzrSQDPe4lg_4m5ZpyEsePuLhKFO7BUeTEOvEmBAzGX37L7z7HLV8cAUdWzqy1-lsyDkdAC_wvVNhWf91wjUuV90q0gIPBjUh790T7nD0WiU1v5jIuz2VJyw-Ot-ZP74IQL_FXsuTzLv1mUqrnMkvn7RARbrKvHROU9q6SI4zp_8zevDuLJWMZF2U0FQ9v2vMT6Ng");'
                                    ></div>
                                </div>
                                </div>
                            </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
