<template>
    <div>
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-3">
        Photos
        </label>
        <div v-if="pictures.length" class="flex flex-row">
            <div class="flex m-2" v-for="(picture,index) in pictures" :key="index" >
                <span class="text-sm m-1 bg-white border rounded p-1 cursor-pointer hover:bg-red-400 hover:text-white absolute" @click="removePicture(index)">X</span>
                <img :src="picture.url" :alt="picture.filename" class="bg-gray-300 h-20 w-20">
            </div>
            <div class="flex m-2">
                <label class="h-20 w-20 bg-gray-100 hover:bg-gray-300 pt-4 cursor-pointer" for="file-upload">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg> 
                </label>  
            </div>
        </div>
        <div v-show="!pictures.length" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                    <span>Upload a file</span>
                    <input @change="uploadPictures()" ref="album-pictures" id="file-upload" name="file-upload" type="file" class="sr-only" multiple accept="image/x-png,image/jpg,image/jpeg" >
                </label>
                <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">
                PNG, JPG, GIF up to 10MB
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props : ['old'],
    data(){
        return {
            pictures : []
        }
    },
    methods : { 
		uploadPictures: function(){
			let files = this.$refs['album-pictures'].files; 
            Array.from(files).forEach(file => { 
                this.requestFile(file,files.length);
            }); 
		},
        requestFile: function(file,max){   
            const fd = new FormData() 
            fd.append('file', file) 
            axios.post(route('upload'), fd).then((response)=>{ 
                this.pictures.push(response.data) 
                this.$emit('refreshUpload',this.pictures) 
            })
        },
        removePicture: function(index){
            this.pictures.splice(index,1)
            this.$emit('refreshUpload',this.pictures) 
        }

    },
    created(){
        if((this.old)&&(this.old.length)){
            this.pictures = this.old
        }
    }
}
</script>