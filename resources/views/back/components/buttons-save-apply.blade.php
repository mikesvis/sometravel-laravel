@if ($isNew)
    <div class="form-group row mb-0">
        <div class="col-12">
            <button type="submit" class="btn btn-success"><em class="fas fa-check mr-1"></em> Создать</button>
        </div>
    </div>
@else
    <div class="form-group row mb-0">
        <div class="col-12">
            <button type="submit" class="btn btn-success" name="save"><i class="far fa-save mr-1"></i> Сохранить</button>
            <button type="submit" class="btn btn-success" name="apply"><i class="fas fa-check mr-1"></i> Применить</button>
        </div>
    </div>
@endif
