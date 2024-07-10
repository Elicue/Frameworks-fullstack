<template>
  <div class="flex flex-col w-1/2 gap-6">
    <div  class="flex flex-col gap-1">
      <p class=" text-base uppercase text-gray-400">{{ categoryTitle }}</p>
      <p class="text-base">{{playlistTitle}}</p>
    </div>
    <div class="relative rounded-lg">
      <img class="rounded-lg" :src="image" alt="suggestion">
      <p class="absolute text-white bottom-4 left-4 font-medium">{{description}}</p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'PlaylistExplore',

  props: {
    categoryTitle: String,
    playlistTitle: String,
    description: String,
    image: String,
  },
}
</script>