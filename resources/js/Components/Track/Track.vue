<template>
  <div class="shadow-[0px_0px_20px_0px_rgba(139,92,246,0.06)] hover:scale-[1.01] rounded-lg transition-all duration-500 bg-white p-3 flex flex-row justify-between w-full h-[17vh] hover:shadow-[0px_0px_20px_0px_rgba(139,92,246,0.1)]" :class="{'border-violet-500  border duration-100' : active }">
    <div class="flex flex-row gap-5 relative w-full">
      <img class="w-[130px] h-fill object-cover rounded-md" :src="'/storage/' + track.cover" alt="cover_album">
      <div class="flex flex-col justify-between w-full">
        <ul class="flex flex-col">
          <li class="list-none text-xl font-bold">{{ track.title }}</li>
          <li class="list-none text-sm text-gray-400">{{ track.artist }}</li>
        </ul>
        <div class="flex flex-row justify-between">
          <button class="w-fit bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none hover:ring hover:ring-violet-300 focus:ring focus:ring-violet-300 px-2 py-2 rounded-full justify-center flex flex-row items-center gap-1 uppercase duration-500" @click="handleClick"><img class="w-4 h-fit" :src="[active ? '/storage/tracks/images/pause.svg' : ' /storage/tracks/images/play.svg']" alt="play"></button>
          <div class="flex flex-row gap-4">
            <Link v-if="$page.props.isAdmin" :href="route('tracks.edit', { track: track })" class="w-fit font-medium border border-violet-500 hover:bg-violet-600 active:bg-violet-700 px-6 py-1 rounded-md text-violet-500 hover:text-white duration-500">Edit</Link>
            
            <Link v-if="$page.props.isAdmin" :href="route('tracks.destroy', { track: track })" class="w-fit border border-red-500 hover:bg-red-600 active:bg-red-700 px-6 py-1 rounded-md text-red-500 font-medium hover:text-white duration-500" as="button" method="delete">Delete</Link>
          </div>
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
    
    active: {
      type: Boolean,
      default: false,
    }
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
