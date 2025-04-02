<template>
    <Head title="Cargos"/>

    <AuthenticatedLayout>
    <template #header>
    <div class="flex items-center gap-8">
    Cargos
      <DarkButton @click="openModalForm(1)">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
</DarkButton>
</div>
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md" :class="classMsj">
        <div class="flex justify-center items-center w-12 bg-blue-500">
          <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
          </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
          <div class="mx-3">
            <span class="font-semibold text-blue-500">Información</span>
            <p class="text-sm text-gray-600">{{ msj }}</p>
          </div>
        </div>
      </div>

      <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
        <div class="overflow-x-auto w-full">
          <table class="w-full whitespace-no-wrap">
            <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Nombre del Cargo</th>
              <th class="px-4 py-3">Descripción</th>
              <th class="px-4 py-3">Actualizar</th>
              <th class="px-4 py-3">Borrar</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y">
            <tr v-for="cargo,i in cargos.data" :key="cargo.id" class="text-gray-700">
                <td class="px-4 py-3 text-sm">
                {{ (i+1) }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ cargo.nombre }}
              </td>
              <td class="px-4 py-3 text-sm">
                {{ cargo.descripcion }}
              </td>
              <td class="px-4 py-3 text-sm">
                <WarningButton @click="openModalForm(2,cargo)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </WarningButton>
              </td>
              <td class="px-4 py-3 text-sm">
                <DangerButton @click="openModalDel(cargo)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
                </DangerButton>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <div
            class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
          <pagination :links="cargos.links" />
        </div>
      </div>
    </div>

    <Modal :show="showModalForm" @close="closeModalForm">
        <div class=""p-6>
            <h2 class="m-6 flex justify-center text-lg font-medium text-gray-900">{{  title }}</h2>
            <div class="m-6 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
            </div>

            <div class="m-6 mb-6 space-y-6 max-w-xl">
                <InputGroup :text="'Nombre del Cargo'" :required="'required'" v-model="form.nombre" :type="'text'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                    </svg>
                </InputGroup>
                <InputError class="mt-1" :message="form.errors.nombre">
                </InputError>

                <InputGroup :text="'Descripción del Cargo'" :required="'required'" v-model="form.descripcion" :type="'text'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                    </svg>

                </InputGroup>
                <InputError class="mt-1" :message="form.errors.descripcion">
                </InputError>
                <PrimaryButton @click="save">
                    Guardar
                </PrimaryButton>
            </div>
        </div>
        <div class="m-6 flex justify-center">
            <SecondaryButton @click="closeModalForm">Cancelar</SecondaryButton>
        </div>
    </Modal>

    <Modal :show="showModalDel" @close="closeModalDel">
        <div class="flex justify-center p-6">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
        </div>
        <div class="flex justify-center p-6">
            <p  class="text-2xl text-gray-600"> ¿Estás seguro de eliminar
            <span class="text-2xl font-medium text-gray-700">{{ v.nombre }}
            </span> de la lista de Cargos?</p>
            <br>
        </div>
        <div class="m-6 flex justify-center">
            <PrimaryButton @click="deleteCargo">
                Si, Eliminar.
            </PrimaryButton>
        </div>
        <div class="m-6 flex justify-end">
            <SecondaryButton @click="closeModalDel">Cancelar</SecondaryButton>
        </div>
    </Modal>
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
import {ref} from 'vue';
import InputGroup from '@/Components/InputGroup.vue';
import SelectInput from '@/Components/SelectInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
  const props = defineProps({
      cargos: Object
  });

  const form = useForm({
    nombre:'',
    descripcion:''
  });

  const v = ref({id:'', nombre:'', descripcion:''});

  const showModalView = ref(false);
  const showModalForm = ref(false);
  const showModalDel = ref(false);

  const title = ref('');

  const operation = ref(0);
  const msj = ref('');
  const classMsj = ref('hidden');

  const openModalForm = (op,cargo) =>{

    showModalForm.value = true;
    operation.value = op;
    if(op ===1){
        title.value = 'Crear Cargo';
        console.log(title.value);
    }
    else {
        title.value = 'Editar Cargo';
        console.log(title.value);
        form.nombre = cargo.nombre;
        form.descripcion = cargo.descripcion;
        v.value.id = cargo.id;
    }
  }
  const openModalDel = (cargo) =>{
    showModalDel.value = true;
    v.value.id = cargo.id;
    v.value.nombre = cargo.nombre
  }
  const closeModalForm = () =>{
    showModalForm.value = false;
    form.reset();
  }
  const closeModalDel = () =>{
    showModalDel.value = false;
  }
  const save = () => {
    if(operation.value === 1){
        form.post(route('cargos.store'),{
            onSuccess: () =>{ok('Cargo Creado')}
        }
        );
        form.reset();
    }
    else {
        form.patch(route('cargos.update',v.value.id),{
            onSuccess: () =>{ok('Cargo Actualizado')}
        });
        form.reset();
    }
  }
  const ok= (m) => {
    if (operation.value == 2){
        closeModalForm();
    }
    closeModalDel();
    form.reset();
    msj.value = m;
    classMsj.value = 'block';
  }
  const deleteCargo = () => {
    form.delete(route('cargos.destroy',v.value.id),{
        onSuccess: () => { ok('Cargo Eliminado')}
    })
  }
</script>
