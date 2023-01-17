<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="mb-4 text-sm text-gray-600">
            Hvala Vam što ste se prijavili! Prije nego što počnete, možete li da verifikujete svoju e-mail adresu klikom na vezu
            koju smo Vam upravo poslali? Ako niste primili poštu, rado ćemo Vam poslati drugu.
        </div>

        <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
            Nova veza za verifikaciju je poslata na e-mail adresu koju ste naveli prilikom registracije.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Ponovo pošaljite e-mail za verifikaciju
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >Odjavite se</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>
