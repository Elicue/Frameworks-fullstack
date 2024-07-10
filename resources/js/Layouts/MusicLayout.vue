<template>
  <div >
    <nav class=" bg-white border-b border-b-gray-200 sticky top-0 z-10">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <Link :href="route('tracks.index')"><img class="h-10 w-auto" src="/storage/tracks/images/logo.svg" alt="Logo"></Link>
            </div>
            <div class="flex items-center ml-6">
              <div class="flex space-x-4">
                <Link v-if=" $page.props.auth.user" :href="route('playlists.index')" class=" border-b-transparent border-b text-base font-medium text-black hover:border-b-white transition-all duration-300 ">Playlists</Link>
              </div>
            </div>
          </div>
          
          <div class=" flex items-center flex-row gap-4 ">
            <Link v-if="! $page.props.auth.user" class="text-black" :href="route('login')">Connect</Link>
            <Link v-if="! $page.props.auth.user" class="text-black" :href="route('register')">Create an account</Link>
            <Link v-if=" $page.props.auth.user" class="text-black" :href="route('logout')" as="button" method="POST">Logout</Link>
            <img class="h-10 w-10 rounded-full bg-gray-200 object-[0_4px]" src="/storage/tracks/images/profil.png" alt="profil picture">
          </div>
        </div>
      </div>

      <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black" aria-current="page">Dashboard</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black">Team</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black">Projects</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black">Calendar</a>
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
          <slot name="more"></slot>
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