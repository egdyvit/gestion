<template>

    <Head title="Crear Proyecto" />

    <AuthenticatedLayout>
        <template #header>
            Crear Proyecto
        </template>

        <form @submit.prevent="submit">
        <div class="ml-24 mr-24 p-10 border shadow bg-white rounded-lg shadow-xs flex justify-center">
            <div class="">
                <img :src="'/images/gestiona.jpeg'" alt="Logo"
                    style="width: 85%; height: auto; border-radius: 8px; object-fit: cover;" />
            </div>

            <div class="m-6 max-w-xl w-full space-y-2">

                <InputLabel class="font-bold" for="nombre" value="Nombre del Proyecto" />
                <InputGroup id="nombre" :text="'Nombre del Proyecto'" :required="'required'" v-model="form.nombre"
                    :type="'text'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                </InputGroup>
                <InputError class="mt-1" :message="form.errors.nombre">
                </InputError>

                <InputLabel class="font-bold"for="descripcion" value="Descripción" />
                <InputGroupLarge id="descripcion" :text="'Descripción del Proyecto'" :required="'required'"
                    v-model="form.descripcion" :type="'text'">
                </InputGroupLarge>
                <InputError class="mt-1" :message="form.errors.descripcion">
                </InputError>
            </div>
        </div>



        <div class="m-6 mb-6 p-4 border shadow bg-blue-950 rounded-lg shadow-xs grid gap-6 md:grid-cols-2">

            <div class="space-y-3">
                <!---->

                <InputLabel class="text-white font-bold" for="fecha_inicio" value="Fecha de Inicio" />
                <InputGroup
                    id="fecha_inicio"
                    :text="'Fecha de Inicio del Proyecto'"
                    :required="'required'"
                    v-model="form.fecha_inicio"
                    :type="'date'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </InputGroup>
                <InputError class="mt-1" :message="form.errors.fecha_inicio">
                </InputError>

                <InputLabel class="text-white font-bold" for="responsable" value="Responsable" />
                <InputGroup id="responsable" :text="'Responsable del Proyecto'" :required="'required'" v-model="form.responsable_id"
                    :type="'text'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </InputGroup>
                <InputError class="mt-1" :message="form.errors.responsable_id">
                </InputError>
            </div>

            <div class="space-y-3">
                <!---->

                <InputLabel class="text-white font-bold" for="fecha_fin" value="Fecha para Finalizar" />
                <InputGroup id="fecha_fin":text="'Fecha Fin del Proyecto'" :required="'required'" v-model="form.fecha_fin"
                    :type="'date'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                </InputGroup>
                <InputError class="mt-1" :message="form.errors.fecha_fin">
                </InputError>

                <InputLabel class="text-white font-bold" for="estado" value="Estado del Proyecto" />

                    <select v-model="form.estado" class="rounded block w-full pl-5 mt-1 text-sm text-black dark:text-gray-600 dark:border-gray-600 dark:bg-white focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" name="estado" value="Privacidad">

                        <option value="finalizado">Finalizado</option>
                        <option value="activo">Activo</option>
                        <option value="pausa">Pausa</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                <InputError class="mt-1" :message="form.errors.estado">
                </InputError>

            </div>


        </div>
        <div class="m-6 mb-6 flex justify-center gap-20">
            <div
                class="rounded-lg border border-gray-800 bg-white px-2 py-2 text-center text-sm font-medium text-gray-700 transition-colors duration-150 hover:bg-blue-400 focus:outline-none focus:ring active:bg-gray-700">
                <NavLink :href="route('proyectos.index')">
                    <template #icon><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </template>Cancelar
                </NavLink>
            </div>
            <PrimaryButton>
                Guardar
            </PrimaryButton>
        </div>
    </form>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, useForm } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import WarningButton from '@/Components/WarningButton.vue';
import DarkButton from '@/Components/DarkButton.vue';
import { ref } from 'vue';
import InputGroup from '@/Components/InputGroup.vue';
import InputGroupLarge from '@/Components/InputGroupLarge.vue';
import SelectInput from '@/Components/SelectInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import NavLink from '@/Components/NavLink.vue';
import InputLabel from '@/Components/InputLabel.vue';

const form = useForm({
    nombre: '',
    descripcion: '',
    fecha_inicio: '',
    fecha_fin: '',
    responsable_id: '',
    estado: 'activo'
});

const submit = () => {
    form.post(route('proyectos.store'))
}

</script>
