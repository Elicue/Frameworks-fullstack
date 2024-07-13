<template>
  <MusicLayout>
    <template #action>
      <div class="flex flex-row  mb-12 justify-between w-full">
        <h1 class="list-none text-4xl text-black font-bold">My Keys</h1>
        <div class=" w-1/3 gap-4 flex flex-row justify-end">
          <Link :href="route('api-keys.create')" class="w-fit bg-violet-500 hover:bg-violet-600 active:bg-violet-700 px-6 py-2 rounded-md font-bold shadow text-white">Add</Link>
        </div>
      </div>
    </template>

    <template #content>
      <div class="flex flex-col">
        <ul class="grid grid-cols-4 border-b border-b-gray-200 pb-4">
          <li></li>
          <li class="font-semibold">Name</li>
          <li class="font-semibold">Created at</li>
        </ul>
        <ul  class="grid grid-cols-4 border-b border-b-gray-200 py-4 items-center" v-for="(key, i) in keys" :key="keys.uuid">
          <p># {{ i + 1 }}</p>
          <p class="capitalize">{{ key.name }}</p>
          <p class="text-gray-400">{{ key.created_at }}</p>
          <div class="flex flex-row justify-end">
            <Link :href="route('api-keys.destroy', key.uuid)" as="button" method="delete" class="text-red-500 flex w-fit px-4 py-1 active:text-red-700 border border-red-500 rounded-md hover:bg-red-500 hover:text-white transition-all duration-300 font-medium">Delete</Link>
          </div>
        </ul>
      </div>
    </template>

  </MusicLayout>
</template>

<script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';

  export default {
    name: 'Index',

    props: {
      keys: Array,
    },

    components: {
      MusicLayout,
    },

  }
  
</script>