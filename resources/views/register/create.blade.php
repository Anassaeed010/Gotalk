<x-layouts.auth>
    <form method="post" enctype="multipart/form-data" class="space-y-2">
        @csrf
        <div class="max-w-sm input-floating">
            <input type="file" required accept="image/*" class="input" id="avatar" name="avatar" />
            <label class="input-floating-label" for="avatar">صورة الحساب</label>
            @error('avatar')
                <div class="text-error helper-text ps-3 mb-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <x-input id="name" minLength="3" label="اسم المستخدم" icon="icon-[tabler--user]" />
        <x-input id="email" label="البريد الالكتروني" icon="icon-[tabler--mail]" type="email" />
        <x-input id="password" minLength="8" label="كلمة المرور" icon="icon-[tabler--lock]" type="password" />
        <x-input id="password_confirmation" minLength="8" label="تأكيد كلمة المرور" icon="icon-[tabler--lock-check]"
            type="password" />

        <button type="submit" class="btn btn-primary w-full mt-8">تسجيل حساب</button>
        <span>
            عندك حساب؟
            <a href="/login" class="link link-animated">سجل دخول</a>
        </span>
    </form>
</x-layouts.auth>