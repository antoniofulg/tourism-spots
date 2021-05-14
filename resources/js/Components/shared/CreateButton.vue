<template>
  <button class="focus:outline-none outline-none" @click="$emit('clicked')">
    <div
      class="flex rounded-xl group hover:bg-gray-300 transition duration-300"
    >
      <div
        class="
          flex-none
          bg-white
          h-16
          w-16
          rounded-xl
          flex
          justify-center
          bg-white
          group-hover:bg-blue-500
          transition
          duration-300
        "
      >
        <span class="text-4xl font-bold self-center px-4">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            class="
              fill-current
              text-grey-700
              group-hover:text-white
              transition
              duration-300
            "
          >
            <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" />
          </svg>
        </span>
      </div>
      <div class="flex flex-grow items-center py-2">
        <div>
          <span
            class="
              text-xl
              block
              font-extrabold
              px-4
              text-gray-600
              group-hover:text-gray-700
              transition
              duration-300
            "
          >
            {{ title }}
          </span>
        </div>
      </div>
    </div>
  </button>
</template>

<script>
export default {
  name: 'CreateButton',
  emits: ['clicked'],
  props: {
    title: {
      type: String,
      default: '',
    },
  },
}
</script>
