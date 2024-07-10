<template>
  <MusicLayout>
    <template #content>
      <div>
        <form @submit.prevent="submit">
          <!-- Title -->
          <div class="flex flex-col gap-2 w-1/2">
            <label for="title" class="font-bold">Title</label>
            <input type="text" v-model="form.title" id="title" class="border border-gray-200 outline-none rounded-md" placeholder="Title" :class="{'border-red-500': form.errors.title}">
            <p class="text-red-500 text-xs italic">{{form.errors.title}}</p>
          </div>

          <input type="submit" class="w-fit px-6 py-2 rounded-md font-bold transition-all duration-500 text-white shadow-[0px_0px_34px_0px_rgba(0,0,0,0.08)] hover:shadow-[0px_0px_34px_0px_rgba(0,0,0,0.1)] hover:scale-[1.01]" value="Submit your playlist" :class="[form.processing ? 'bg-gray-500' : ' bg-violet-500 hover:bg-violet-600 active:bg-violet-700']" :disabled="form.processing">

        </form>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';

  export default {
    name: 'Create',

    data() {
      return {
        form: this.$inertia.form({
          title: '',
        }),
      }
    },

    methods: {
      submit() {
        this.form.post(route('playlists.store'));
      }
    },

    components: {
      MusicLayout,
    },

  }
</script>