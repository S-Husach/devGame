<template>
  <app-layout>
    <!-- Page Heading -->
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header">
          <h2 class="text-2xl font-semibold ml-5 leading-tight">Cabinet</h2>
        </slot>
      </div>
    </header>

    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-2 mb-6 flex sm:flex-row flex-col">
          <div class="flex flex-row mb-8 sm:mb-0 ml-5"></div>
        </div>

        <!-- Table into the card -->

        <div
          class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10 text-xl"
        >
          <div class="mb-5">
            <h1 class="text-5xl font-semibold mx-auto">Welcome to your cabinet, {{ $page.user.name }}!</h1>
          </div>
          <div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
            cumque quibusdam vel enim nesciunt accusantium earum saepe maiores,
            explicabo assumenda molestiae quam animi eius cum. Reprehenderit aut
            porro qui unde.
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
};
</script>
