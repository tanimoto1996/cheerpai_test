<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

const logout = () => {
  router.post(route("admin.logout"));
};
</script>

<template>
  <Head title="User Dashboard" />

  <div>
    <p>This is an User dashboard page!!!!!</p>
    <button @click="logout">Logout</button>
  </div>
</template>
