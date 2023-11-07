<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

const logout = () => {
  router.post(route("staff.logout"));
};
</script>

<template>
  <Head title="Admin Dashboard" />

  <div>
    <p>This is an staff dashboard page!</p>
    <button @click="logout">Logout</button>
  </div>
</template>
