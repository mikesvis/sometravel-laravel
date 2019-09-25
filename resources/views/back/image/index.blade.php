<div class="mb-4" id="imageUploadFormMimic">
    <div class="form-group m-0">
        <label for="imageUpload">Загрузка изображений</label>
        <div class="row">
            <div class="col col-lg-8 col-xl-5">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input @error('image')is-invalid @enderror" id="imageUpload">
                    <label class="custom-file-label" for="customFile">Выберите файл с изображением</label>
                    @error('image')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-auto">
                <span class="btn btn-success" name="upload" id="uploadButton"><i class="fas fa-upload mr-1"></i> Загрузить</span>
            </div>

        </div>
    </div>
</div>

<div class="row">
    @forelse ($model->images as $image)
    <div class="col-12 col-sm-6 col-md-auto mb-4">
        <div class="border rounded">
            <a href="{{ $image->path }}" class="d-block p-1 fancybox opacit" @if ((bool)$image->status == false) style="opacity: .5" @endif>
                <img src="/timthumb.php?src={{ $image->path }}&w=198&h=198" class="d-block w-100">
            </a>
            <div class="px-1 pb-1">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <a href="{{ route('admin.image.edit', $image->id) }}" class="btn btn-outline-success">
                            <em class="fas fa-pencil-alt"></em>
                        </a>
                    </div>
                    <div class="col text-center">
                        <span class="badge badge-secondary" title="порядок">{{ $image->ordering }}</span>
                    </div>
                    <div class="col-auto">
                            <span
                            class="btn btn-outline-danger delete"
                            title="Удалить"
                            data-element_name="Изображение ID: {{ $image->id }}"
                            disabled
                            data-delete="nested"
                            data-action="{{ route('admin.image.destroy', [$image->id, class_basename($model), $model->id]) }}"
                            ><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @empty

    @endforelse
</div>
