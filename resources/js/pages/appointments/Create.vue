<script setup>
import { useForm } from '@inertiajs/vue3';
import { Modal } from '@inertiaui/modal-vue';
import { ref } from 'vue';

// Mock data
const props = defineProps({
    roles: {
        type: Object,
        default: () => ({
            1: 'Admin',
            2: 'Manager',
            3: 'User'
        })
    }
});

const form = useForm({
    name: '',
    email: '',
    role_id: '',
});

const modalRef = ref(null);

function submit() {
    form.post('/users', {
        onSuccess() {
            modalRef.value.close();
        }
    });
}
</script>

<template>
    <Modal ref="modalRef" #default="{ close }">
        <div>
            <h2 class="text-lg font-medium text-gray-900">Create User</h2>
            <p class="text-sm text-gray-500">Enter user details below</p>
        </div>
    </Modal>
</template>