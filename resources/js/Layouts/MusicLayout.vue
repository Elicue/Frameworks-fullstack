<template>
  <div >
    <nav class=" bg-violet-900 sticky top-0 z-10">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <a href="/tracks"><img class="h-10 w-auto" src="/storage/tracks/images/logo.svg" alt="Logo"></a>
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <a href="/playlists" class="block rounded-md px-3 py-2 text-base font-medium text-white" aria-current="page">Playlists</a>
              </div>
            </div>
          </div>
          
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button type="button" class="relative flex rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="h-10 w-10 rounded-full" src="/storage/tracks/images/profil.png" alt="profil picture">
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white">Team</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white">Projects</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white">Calendar</a>
        </div>
      </div>
    </nav>

    <main class="min-h-[90vh]">
    <!-- <main class="bg-[url('/storage/tracks/images/background.svg')] bg-no-repeat bg-[length:50vw] min-h-[90vh] bg-fixed"> -->
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
          <slot name="action"></slot>
          <slot name="explore"></slot>
          <slot name="content"></slot>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
export default {
  name: 'MusicLayout',
}
</script>