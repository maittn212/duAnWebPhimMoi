<!-- Modal quảng cáo -->
<div class="modal fade" id="bannerQC" tabindex="-1" aria-labelledby="bannerTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="modal-header bg-dark text-white border-0 d-flex justify-content-between align-items-center">
                <h5 class="modal-title fw-bold m-0 text-center" id="bannerTitle">
                    @if ($bannerModal)
                        {{ $bannerModal->title }}
                    @else
                        Liên hệ quảng cáo: {{ $info_home->email }}
                    @endif
                    
                </h5>
            </div>
            <div class="modal-body p-0 position-relative">
                @if ($bannerModal)

                <form action="{{ route('update-click', $bannerModal->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button style="border: none; background: transparent; padding: 0;">
                        <a href="{{ $bannerModal->url }}" target="_blank">
                            @php
                                $image_check = substr($bannerModal->image, 0, 5);
                            @endphp
                            @if ($image_check == 'https')
                                <img src="{{ $bannerModal->image }}" alt="{{ $bannerModal->title }}"
                                    title="{{ $bannerModal->title }}" class="img-fluid rounded-bottom">
                            @else
                                <img src="{{ Storage::url($bannerModal->image) }}" alt="{{ $bannerModal->title }}"
                                    title="{{ $bannerModal->title }}" class="img-fluid rounded-bottom">
                            @endif
                        </a>
                    </button>
                </form>
                @else
                <p>Không có quảng cáo hiển thị tại thời điểm này.</p>
                @endif
            </div>
            <div class="modal-footer">
                <!-- Nút đóng ở dưới cùng bên phải -->
                <button id="closeBannerBtn" class="button-30" type="button" class="btn btn-secondary">Đóng</button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Tùy chỉnh modal */
    .modal-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #221f1f;
    }

    .modal-content {
        border-radius: 1rem;
    }

    .modal-header {
        padding: 1rem;
    }

    .modal-body {
        position: relative;
        overflow: hidden;
    }

    .modal-footer {
        justify-content: flex-end;
        /* Đặt nút ở bên phải */
    }

    .button-30 {
        align-items: center;
        appearance: none;
        background-color: #eaeaea;
        border-radius: 4px;
        border-width: 0;
        box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        box-sizing: border-box;
        color: #36395A;
        cursor: pointer;
        display: inline-flex;
        font-family: "JetBrains Mono", monospace;
        height: 40px;
        justify-content: center;
        line-height: 1;
        list-style: none;
        overflow: hidden;
        padding-left: 16px;
        padding-right: 16px;
        position: relative;
        text-align: left;
        text-decoration: none;
        transition: box-shadow .15s, transform .15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        will-change: box-shadow, transform;
        font-size: 18px;
    }

    .button-30:focus {
        box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    }

    .button-30:hover {
        box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        transform: translateY(-2px);
    }

    .button-30:active {
        box-shadow: #D6D6E7 0 3px 7px inset;
        transform: translateY(2px);
    }
</style>

<script>
    document.getElementById('closeBannerBtn').addEventListener('click', function() {
        $('#bannerQC').modal('hide');
    });
</script>
