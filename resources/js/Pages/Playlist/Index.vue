<template>
  <MusicLayout>
    <template #action>
      <div class="flex flex-row  mb-12 justify-between w-full">
        <h1 class="list-none text-4xl text-white font-bold"> Trending right now</h1>
        <div class=" w-1/3 gap-4 flex flex-row justify-end">
          <input placeholder="Search ..." v-model="filter" type="search" class=" w-10/12 rounded-lg text-md shadow border-none outline-none">
          <Link :href="route('playlists.create')" class="w-fit bg-violet-500 hover:bg-violet-600 active:bg-violet-700 px-6 py-2 rounded-md font-bold shadow text-white">Add</Link>
        </div>
      </div>
    </template>

  </MusicLayout>
</template>

<script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';


  export default {
    name: 'Index',

    components: {
      MusicLayout,
    },

    props: {
      playlists: Array,
    },

  }
</script>