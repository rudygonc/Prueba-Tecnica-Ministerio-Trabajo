<template>
    <div>
        <h1 class="text-center">Gestionar Personas</h1>
    </div>
    <!-- Trigger the modal with a button -->
    <button
        @click="(modificar = false), abrir_modal()"
        type="button"
        class="btn btn-primary"
    >
        Nuevo
    </button>

    <!-- Modal -->
    <div class="modal" v-bind:class="{ mostrar: modal }">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ t_modal }}</h4>
                    <button
                        @click="cerrar_modal()"
                        type="button"
                        class="btn-close"
                        data-dismiss="modal"
                    ></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="row g-3">
                            <div class="col">
                                <label for="primer_nombre" class="form-label">
                                    Fecha Nacimiento
                                </label>
                                <input
                                    v-model="persona.fecha_nacimiento"
                                    type="Date"
                                    class="form-control"
                                    id="fecha_nacimiento"
                                />
                            </div>
                            <div class="col">
                                <label for="primer_nombre" class="form-label">
                                    Primer Nombre
                                </label>
                                <input
                                    v-model="persona.primer_nombre"
                                    type="text"
                                    class="form-control"
                                    id="primer_nombre"
                                />
                            </div>
                            <div class="col">
                                <label for="segundo_nombre" class="form-label"
                                    >Segundo Nombre</label
                                >
                                <input
                                    v-model="persona.segundo_nombre"
                                    type="text"
                                    class="form-control"
                                    id="segundo_nombre"
                                />
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="primer_apellido" class="form-label">
                                    Primer Apellido
                                </label>
                                <input
                                    v-model="persona.primer_apellido"
                                    type="text"
                                    class="form-control"
                                    id="primer_apellido"
                                />
                            </div>
                            <div class="col">
                                <label for="segundo_apellido" class="form-label"
                                    >Segundo Apellido</label
                                >
                                <input
                                    v-model="persona.segundo_apellido"
                                    type="text"
                                    class="form-control"
                                    id="segundo_apellido"
                                />
                            </div>
                            <div class="col">
                                <label for="numero" class="form-label"
                                    >Numero Telefonico</label
                                >
                                <input
                                    v-model="persona.numero"
                                    type="number"
                                    class="form-control"
                                    id="numero"
                                />
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="correo" class="form-label"
                                    >Correo Electronico</label
                                >
                                <input
                                    v-model="persona.correo"
                                    type="email"
                                    placeholder=""
                                    class="form-control"
                                    id="correo"
                                />
                            </div>
                            <div class="col">
                                <label for="sexo" class="form-label"
                                    >Sexo</label
                                >
                                <select 
                                    v-model="persona.sexo" id="sexo" class="form-select">
                                    <option value="0">Seleccione</option>
                                    <option value="1" selected>Masculino</option>
                                    <option value="2" >Femenino</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="estado_civil" class="form-label"
                                    >Estado Civil</label
                                >
                                <select 
                                    v-model="persona.estado_civil" id="estado_civil" class="form-select">
                                    <option value="0">Seleccione</option>
                                    <option value="1" selected>Soltero</option>
                                    <option value="2">Casado</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="departamento" class="form-label"
                                    >Departamento</label
                                >
                                <select  
                                    v-model="persona.departamento" id="departamento" class="form-select">
                                    <option value="0">Seleccione</option>
                                    <option value="1" selected>Guatemala</option>
                                    <option value="2" >Jutiapa</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="municipio" class="form-label"
                                    >Municipio</label
                                >
                                <select 
                                    v-model="persona.municipio" id="municipio" class="form-select">
                                    <option value="0">Seleccione</option>
                                    <option value="1" selected>Guatemala</option>
                                    <option value="2">Jutiapa</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="direccion" class="form-label"
                                    >Direccion</label
                                >
                                <input
                                    v-model="persona.direccion"
                                    type="textarea"
                                    class="form-control"
                                    id="direccion"
                                />
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button
                        @click="cerrar_modal()"
                        type="button"
                        class="btn btn-danger"
                        data-dismiss="modal"
                    >
                        Cancelar
                    </button>
                    <button
                        @click="guardar()"
                        type="button"
                        class="btn btn-success"
                        data-dismiss="modal"
                    >
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <caption>
            Lista de personas
        </caption>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col" colspan="2" class="text-center">Accion</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="per in personas" :key="per.id">
                <th scope="row">{{ per.id }}</th>
                <td>{{ per.primer_nombre }}</td>
                <td>{{ per.primer_apellido }}</td>
                <td>
                    <button
                        @click="(modificar = true), abrir_modal(per)"
                        class="btn btn-warning"
                    >
                        Editar
                    </button>
                </td>
                <td>
                    <button @click="eliminar(per.id)" class="btn btn-danger">
                        Eliminar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            persona: {
                fecha_nacimiento: "",
                primer_nombre: "",
                segundo_nombre: "",
                primer_apellido: "",
                segundo_apellido: "",
                numero: 0,
                correo: "",
                sexo: 0,
                estado_civil: 0,
                departamento: 0,
                municipio: 0,
                direccion: "",
            },
            id:0,
            modificar: true,
            modal: 0,
            t_modal: "",
            personas: [],
        };
    },
    methods: {
        async listar() {
            var res = await axios.get("personas");
            this.personas = res.data;
        },
        async eliminar(id) {
            var res = await axios.delete("personas/" + id);
            this.personas = res.data;
            this.listar();
        },
        async guardar(id) {
          if (this.modificar) {
            var res = await axios.put("personas/"+ this.id, this.persona);
          }else{
            var res = await axios.post("personas", this.persona);
          }
          this.cerrar_modal();
            this.listar();
        },
        abrir_modal(data={}) {
            this.modal = 1;
            if (this.modificar) {
                this.id=data.id,
                this.t_modal = "Modificar Persona";
                this.persona.fecha_nacimiento= data.fecha_nacimiento;
                this.persona.primer_nombre= data.primer_nombre;
                this.persona.segundo_nombre= data.segundo_nombre;
                this.persona.primer_apellido= data.primer_apellido;
                this.persona.segundo_apellido= data.segundo_apellido;
                this.persona.numero= data.numero;
                this.persona.correo= data.correo;
                this.persona.sexo= data.sexo;
                this.persona.estado_civil= data.estado_civil;
                this.persona.departamento= data.departamento;
                this.persona.municipio= data.municipio;
                this.persona.direccion= data.direccion;
            } else {
              
                this.id=0,
                this.t_modal = "Agregar Persona";
                this.persona.fecha_nacimiento= "";
                this.persona.primer_nombre= "";
                this.persona.segundo_nombre= "";
                this.persona. primer_apellido= "";
                this.persona.segundo_apellido= "";
                this.persona.numero= 0;
                this.persona.correo= "";
                this.persona.sexo= 0;
                this.persona.estado_civil= 0;
                this.persona.departamento= 0;
                this.persona.municipio= 0;
                this.persona.direccion= "";
            }
        },
        cerrar_modal() {
            this.modal = 0;
        },
    },

    created() {
        this.listar();
    },
};
</script>
<style>
.mostrar {
    display: list-item;
    opacity: 1;
    background: rgba(122, 123, 124, 0.699);
}
</style>
