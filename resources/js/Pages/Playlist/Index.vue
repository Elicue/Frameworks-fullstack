<template>
  <MusicLayout>
    <template #action>
      <div class="flex flex-row  mb-12 justify-between w-full">
        <h1 class="list-none text-4xl text-black font-bold">Trending right now</h1>
        <div class=" w-1/3 gap-4 flex flex-row justify-end">
          <Link :href="route('playlists.create')" class="w-fit bg-violet-500 hover:bg-violet-600 active:bg-violet-700 px-6 py-2 rounded-md font-bold shadow text-white">Add</Link>
        </div>
      </div>
    </template>

    <template #explore>
      <div class="flex flex-col gap-6 mb-12 bg-white rounded-2xl">
        <h2 class="font-bold text-2xl w-full border-b border-b-gray-200 pb-4">Explore</h2>
        <div  class="flex flex-row justify-between gap-6">
          <PlaylistExplore categoryTitle="RELAXING" playlistTitle="Indie + Chill" description="" image="/storage/tracks/images/suggestion4.png"/>
          <PlaylistExplore categoryTitle="updated playlist" playlistTitle="New Music Daily" description="Your daily meeting place to discover the latest news." image="/storage/tracks/images/suggestion2.png"/>
        </div>
      </div>
    </template>

    <template #content>
      <div class="flex flex-col">
        <h2 class="font-bold text-2xl w-full pb-4">My playlists</h2>
        <ul class="grid grid-cols-5 border-b border-b-gray-200 pb-4">
          <li></li>
          <li class="font-semibold">Title</li>
          <li class="font-semibold">Playlist length</li>
          <li class="font-semibold">Created at</li>
        </ul>
        <ul  class="grid grid-cols-5 border-b border-b-gray-200 py-4 items-center" v-for="(playlist, i) in playlists" :key="playlist.uuid">
          <p># {{ i + 1 }}</p>
          <p class="capitalize">{{ playlist.title }}</p>
          <p>{{ playlist.tracks_count }} musics</p>
          <p class="text-gray-400">{{ playlist.created_at }}</p>
          <div class="flex flex-row gap-4 justify-end">
            <Link :href="route('playlists.show', playlist.uuid)" class="text-violet-500 flex justify-end w-fit px-4 py-1 active:text-violet-700 border border-violet-500 rounded-md hover:bg-violet-500 hover:text-white transition-all duration-300 font-medium">More</Link>
            <Link :href="route('playlists.edit', playlist.uuid)" class="text-violet-500 flex justify-end w-fit px-4 py-1 active:text-violet-700 border border-violet-500 rounded-md hover:bg-violet-500 hover:text-white transition-all duration-300 font-medium">Edit</Link>
            <Link :href="route('playlists.destroy', playlist.uuid)" as="button" method="delete" class="text-red-500 flex justify-end w-fit px-4 py-1 active:text-red-700 border border-red-500 rounded-md hover:bg-red-500 hover:text-white transition-all duration-300 font-medium">Delete</Link>
          </div>
        </ul>
      </div>
    </template>

  </MusicLayout>
</template>

<script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';
  import PlaylistExplore from '@/Components/Track/PlaylistExplore.vue';

  export default {
    name: 'Index',

    props: {
      playlists: Array,
    },

    components: {
      MusicLayout,
      PlaylistExplore,
    },

  }

  
</script>