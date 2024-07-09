<template>
  <div class="rounded-md shadow-[0px_0px_34px_0px_rgba(0,0,0,0.08)] hover:shadow-[0px_0px_34px_0px_rgba(0,0,0,0.1)] hover:scale-[1.01] transition-all duration-500 bg-white p-3 flex flex-row justify-between w-full h-[17vh]">
    <div class="flex flex-row gap-5 relative w-full">
      <img class="w-[130px] h-fill object-cover rounded-md" :src="'storage/' + track.cover" alt="cover_album">
      <div class="flex flex-col justify-between w-full">
        <ul class="flex flex-col">
          <li class="list-none text-xl font-bold">{{ track.title }}</li>
          <li class="list-none flex flex-row items-center gap-1 text-sm text-gray-400"><img class="w-2 h-fit" src="storage/tracks/images/person.svg" alt="person-icon">{{ track.artist }}</li>
        </ul>
        <div class="flex flex-row gap-4">
          <button class="w-fit bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none hover:ring hover:ring-violet-300 focus:ring focus:ring-violet-300 px-2 py-2 rounded-full justify-center flex flex-row items-center gap-1 uppercase" @click="handleClick"><img class="w-4 h-fit" src="storage/tracks/images/play.svg" alt="play"></button>

          <Link :href="route('tracks.edit', { track: track })" class="w-fit border border-violet-500 hover:bg-violet-600 active:bg-violet-700 px-6 py-1 rounded-md shadow text-violet-500 hover:text-white">Edit</Link>

          <Link :href="route('tracks.destroy', { track: track })" class="w-fit border border-red-500 hover:bg-red-600 active:bg-red-700 px-6 py-1 rounded-md shadow text-red-500 hover:text-white" as="button" method="delete">Delete</Link>
        </div>
      </div>
    </div>
    <div>
      <p class="text-xs text-gray-400">{{ track.play_count }}</p>
    </div>
  </div>
</template>

<script>

export default {
  name: 'Track',

  emits: ['play'],

  props: {
    track: Object,
  },

  methods: {
    handleClick() {
      this.$emit('play', this.track);
      // const url = "storage/" + this.track.file;
      // console.log(url);

      // let audio = new Audio(url);
      // audio.play();
    }
  }
}

</script>
