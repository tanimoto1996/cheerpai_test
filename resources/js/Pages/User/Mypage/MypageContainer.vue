<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import DropdownLink from '@/Components/DropdownLink.vue';
  import UserProfileContainer from './UserProfile/UserProfileContainer.vue';
  import StaffListContainer from './FavoriteStaff/StaffListPresentational.vue';
  import NotificationsListContainer from './Notification/NotificationsListContainer.vue';
  import { Head } from '@inertiajs/vue3';

  
</script>

<template>
    <Head title="商品一覧" />
        <DropdownLink :href="route('user.logout')" method="post" as="button">
            Log Out
        </DropdownLink>

        <UserProfileContainer />
        <StaffListContainer />
        <NotificationsListContainer />
</template>