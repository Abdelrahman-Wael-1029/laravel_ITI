<?php

return [


    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute حقل مطلوب.',
    'accepted_if' => ':attribute حقل مطلوب عندما يكون حقل :other مساوياً لـ :value.',
    'active_url' => ':attribute يجب أن يكون رابطاً صالحاً.',
    'after' => ':attribute يجب أن يكون تاريخاً بعد تاريخ :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخاً بعد أو يساوي تاريخ :date.',
    'alpha' => ':attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash' => ':attribute يجب أن يحتوي على أحرف وأرقام وشرطات سفلية فقط.',
    'alpha_num' => ':attribute يجب أن يحتوي على أحرف وأرقام فقط.',
    'array' => ':attribute يجب أن يكون array.',
    'ascii' => ':attribute يجب أن يحتوي على أحرف هجائية وأرقام ورموز فقط.',
    'before' => ':attribute يجب أن يكون تاريخاً قبل تاريخ :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخاً قبل أو يساوي تاريخ :date.',
    'between' => [
        'array' => ':attribute يجب أن يحتوي على ما بين :min و :max عنصر.',
        'file' => ':attribute يجب أن يكون حجم ملف :attribute بين :min و :max كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون بين :min و :max.',
        'string' => ':attribute يجب أن يكون طول :attribute بين :min و :max حرف.',
    ],
    'boolean' => ':attribute يجب أن يكون true أو false.',
    'can' => ':attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed' => ':attribute لا يطابق تأكيد :attribute.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => ':attribute يجب أن يكون تاريخاً صالحاً.',
    'date_equals' => ':attribute يجب أن يكون تاريخاً مساوياً لتاريخ :date.',
    'date_format' => ':attribute يجب أن يتوافق تنسيق تاريخ :attribute مع :format.',
    'decimal' => ':attribute يجب أن يحتوي على :decimal خانات عشرية.',
    'declined' => ':attribute يجب أن يكون مرفوضاً.',
    'declined_if' => ':attribute يجب أن يكون مرفوضاً عندما يكون حقل :other مساوياً لـ :value.',
    'different' => ':attribute و :other يجب أن يكونا مختلفين.',
    'digits' => ':attribute يجب أن يحتوي على :digits رقم.',
    'digits_between' => ':attribute يجب أن يحتوي على ما بين :min و :max رقم.',
    'dimensions' => ':attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => ':attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with' => ':attribute يجب ألا ينتهي بأحد القيم التالية: :values.',
    'doesnt_start_with' => ':attribute يجب ألا يبدأ بأحد القيم التالية: :values.',
    'email' => ':attribute يجب أن يكون عنوان بريد إلكتروني صالحاً.',
    'ends_with' => ':attribute يجب أن ينتهي بأحد الأشياء التالية: :values.',
    'exists' => 'المحدد :attribute غير صالح.',
    'file' => ':attribute يجب أن يكون ملفًا.',
    'filled' => 'يجب أن يكون حقل :attribute له قيمة.',
    'gt' => [
        'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
        'file' => 'يجب أن يكون :attribute أكبر من :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أكبر من :value حرفًا.',
        'array' => 'يجب أن يكون :attribute أكبر من :value عنصرًا.',
    ],
    'gte' => [
        'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value.',
        'file' => 'يجب أن يكون :attribute أكبر من أو يساوي :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أكبر من أو يساوي :value حرفًا.',
        'array' => 'يجب أن يكون :attribute يحتوي على :value عنصرًا أو أكثر.',
    ],
    'image' => 'يجب أن يكون :attribute صورة.',
    'in' => 'المحدد :attribute غير صالح.',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن يكون :attribute سلسلة JSON صالحة.',

    'lt' => [
        'numeric' => 'يجب أن يكون :attribute أقل من :value.',
        'file' => 'يجب أن يكون :attribute أقل من :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أقل من :value حرفًا.',
        'array' => 'يجب أن يكون :attribute أقل من :value عنصرًا.',
    ],
    'lte' => [
        'numeric' => 'يجب أن يكون :attribute أقل من أو يساوي :value.',
        'file' => 'يجب أن يكون :attribute أقل من أو يساوي :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أقل من أو يساوي :value حرفًا.',
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :value عنصرًا.',
    ],
    'max' => [
        'numeric' => 'قد لا يكون :attribute أكبر من :max.',
        'file' => 'قد لا يكون :attribute أكبر من :max كيلوبايت.',
        'string' => 'قد لا يكون :attribute أكبر من :max حرفًا.',
        'array' => 'قد لا يكون :attribute أكثر من :max عنصرًا.',
    ],
    'mimes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'mimetypes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'min' => [
        'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
        'file' => 'يجب أن يكون :attribute على الأقل :min كيلوبايت.',
        'string' => 'يجب أن يكون :attribute على الأقل :min حرفًا.',
        'array' => 'يجب أن يكون :attribute على الأقل :min عنصرًا.',
    ],
    'not_in' => 'المحدد :attribute غير صالح.',
    'not_regex' => 'تنسيق :attribute غير صالح.',
    'numeric' => 'يجب أن يكون :attribute رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب أن يكون حقل :attribute موجودًا.',
    'regex' => 'تنسيق :attribute غير صالح.',
    'required' => 'مطلوب :attribute حقل .',
    'required_if' => 'حقل :attribute مطلوب عندما :other يكون :value.',
    'required_unless' => 'حقل :attribute مطلوب ما لم :other يكون في :values.',
    'required_with' => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
    'required_with_all' => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
    'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values موجودًا.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا يكون أي من :values موجودًا.',
    'same' => 'يجب أن يتطابق :attribute و :other.',
    'size' => [
        'numeric' => 'يجب أن يكون :attribute :size.',
        'file' => 'يجب أن يكون :attribute :size كيلوبايت.',
        'string' => 'يجب أن يكون :attribute :size حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على :size عنصرًا.',
    ],
    'starts_with' => 'يجب أن يبدأ :attribute بأحد الخيارات التالية: :values.',
    'string' => 'يجب أن يكون :attribute سلسلة.',
    'timezone' => 'يجب أن يكون :attribute منطقة صالحة.',
    'unique' => 'تم أخذ :attribute بالفعل.',
    'uploaded' => 'فشل تحميل :attribute.',
    'url' => 'تنسيق :attribute غير صالح.',
    'uuid' => 'يجب أن يكون :attribute UUID صالحًا.',




    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
