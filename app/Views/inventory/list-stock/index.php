<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<style>
    .hilang{
    display: none;
  }
</style>
<div class="col-12">
    <div class="card">
    <form action="" method="get" class="p-2">
        <div class="card rounded-20 p-2">
            <div class="card-header rounded-t-20 pt-1 pl-2 pb-1 pr-2">
                <h4 class="text-center text-uppercase">Filter Stok</h4>
            </div>
            <div class="card-body rounded-20 p-3">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group ">
                            <label> period :</label>
                            <select class="form-control select2" data-placeholder="Choose one" id="daterange" name="type">
                                <option value="day" {{ (Request::get('type') == 'day') ? 'selected' : ''}}>Daily</option>
                                <option value="monthly" {{ (Request::get('type') == 'monthly') ? 'selected' : '' }}>Monthly</option>
                                <option value="yearly" {{ (Request::get('type') == 'yearly') ? 'selected' : '' }}>Yearly</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="col-lg-3">
                        <div class="form-group" id="datepicker-date-area">
                            <label> Date :</label>
                            <input type="text" name="start_date" id="date" value="<?= service('request')->getGet('start_date') ?? date('Y-m-d') ?>" autocomplete="off" class="datepicker form-control time" required>
                        </div>
                        <div class="form-group hilang" id="datepicker-month-area">
                            <label> Month :</label>
                            <input type="text" name="month" id="month" value="<?= service('request')->getGet('month') ?? date('Y-m') ?>" autocomplete="off" class="datepicker-month form-control time" required>
                        </div>
                        <div class="form-group hilang" id="datepicker-year-area">
                            <label> Year :</label>
                            <input type="text" name="year" id="month" value="<?= service('request')->getGet('year') ?? date('Y') ?>" autocomplete="off" class="datepicker-year form-control" required>
                        </div>
                    </div>

    
                    <!-- <div class="col-lg-5">
                        <div class="form-group mb-3">
                            <label>Material :</label>
                            <select class="form-select mr-sm-2 @error('material_id') is-invalid @enderror" id="material_id" name="material_id" style="width:100%">
                                <option disabled selected>Choose Material</option>
                                @foreach ($materials as $material)
                                <option value="{{ $material->id }}"
                                    {{ old('material_id') == $material->id ? 'selected' : '' }}>
                                    {{ $material->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->
    
                    <div class="col-lg-1">
                        <div class="form-group mt-4 ">
                            <button type="submit" class="btn btn-primary btn-group-lg p-2 ">
                                <!-- {{-- <i class="fas fa-cog fa-lg"></i> --}} -->
                                Generate
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Total Stock</th>
                            <th>Stock In</th>
                            <th>Stock Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1;?>
                        <?php foreach ($materials as $data): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['stock_in'] - $data['stock_out'] ?></td>
                                <td><?= $data['stock_in'] ?></td>
                                <td><?= $data['stock_out'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.datepicker').datepicker({
      format: "yyyy-mm-dd",
        startView: 2,
        minViewMode: 0,
        language: "id",
        daysOfWeekHighlighted: "0",
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        container: '#datepicker-date-area'
    });
  
    $('.datepicker-month').datepicker({
        format: "yyyy-mm",
        startView: 2,
        minViewMode: 1,
        language: "id",
        daysOfWeekHighlighted: "0",
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        container: '#datepicker-month-area'
    });
  
    $('.datepicker-year').datepicker({
        format: "yyyy",
        startView: 2,
        minViewMode: 2,
        language: "id",
        daysOfWeekHighlighted: "0",
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        container: '#datepicker-year-area'
    });
  
    let rangeNow = $('#daterange').val();
    if (rangeNow == 'day') {
        $('#datepicker-date-area').removeClass('hilang');
        const element = document.querySelector('#datepicker-date-area')
        element.classList.add('animated', 'fadeIn')
        // Hilangkan Month
        $('#datepicker-month-area').addClass('hilang');
        $('#datepicker-year-area').addClass('hilang');
  
    } else if(rangeNow == 'monthly') {
        $('#datepicker-month-area').removeClass('hilang');
        const element = document.querySelector('#datepicker-month-area')
        element.classList.add('animated', 'fadeIn')
        // Hilangkan Date
        $('#datepicker-date-area').addClass('hilang');
        $('#datepicker-year-area').addClass('hilang');
    } else {
        $('#datepicker-year-area').removeClass('hilang');
        const element = document.querySelector('#datepicker-year-area')
        element.classList.add('animated', 'fadeIn')
        // Hilangkan Date
        $('#datepicker-date-area').addClass('hilang');
        $('#datepicker-month-area').addClass('hilang');
    }
  
    $('#daterange').on('change', function () {
        val = $(this).val();
        if (val == 'day') {
            $('#datepicker-date-area').removeClass('hilang');
            const element = document.querySelector('#datepicker-date-area')
            element.classList.add('animated', 'fadeIn')
            // Hilangkan Month
            $('#datepicker-month-area').addClass('hilang');
            $('#datepicker-year-area').addClass('hilang');
  
        } else if(val == 'monthly') {
            $('#datepicker-month-area').removeClass('hilang');
            const element = document.querySelector('#datepicker-month-area')
            element.classList.add('animated', 'fadeIn')
            // Hilangkan Date
            $('#datepicker-date-area').addClass('hilang');
            $('#datepicker-year-area').addClass('hilang');
        } else {
            $('#datepicker-year-area').removeClass('hilang');
            const element = document.querySelector('#datepicker-year-area')
            element.classList.add('animated', 'fadeIn')
            // Hilangkan Date
            $('#datepicker-date-area').addClass('hilang');
            $('#datepicker-month-area').addClass('hilang');
        }
    })
</script>    
<?= $this->endSection(); ?>



