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

    'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما يكون :other :value.',
    'active_url' => 'الرابط :attribute غير صحيح.',
    'after' => 'يجب أن يكون تاريخ :attribute بعد :date.',
    'after_or_equal' => 'يجب أن يكون تاريخ :attribute بعد أو يساوي :date.',
    'alpha' => 'يجب أن يحتوي :attribute على حروف فقط.',
    'alpha_dash' => 'يجب أن يحتوي :attribute على حروف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num' => 'يجب أن يحتوي :attribute على حروف وأرقام فقط.',
    'array' => 'يجب أن يكون :attribute  مصفوفة.',
    'before' => 'يجب أن يكون تاريخ :attribute قبل :date.',
    'before_or_equal' => 'يجب أن يكون تاريخ :attribute قبل أو يساوي :date.',
    'between' => [
        'array' => 'يجب أن يحتوي :attribute على :min - :max عناصر/بنود.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min - :max كيلوبايت.',
        'numeric' => 'يجب أن يكون رقم :attribute بين :min - :max.',
        'string' => 'يجب أن يحتوي :attribute بين :min - :max حروف أو أحرف.',
    ],
    'boolean' => 'يجب أن يكون :attribute إما true أو false.',
    'confirmed' => 'حقل التأكيد غير متطابق مع :attribute.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'الحقل :attribute ليس تاريخا صحيحا.',
    'date_equals' => 'يجب أن يكون تاريخ :attribute يساوي :date.',
    'date_format' => 'لا يتوافق :attribute مع الشكل :format.',
    'declined' => 'The :attribute was declined.',
    'declined_if' => 'The :attribute was declined when :other is :value.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مختلفين.',
    'digits' => 'يجب أن يحتوي :attribute على :digits رقم/أرقام.',
    'digits_between' => 'يجب أن يحتوي :attribute بين :min و :max رقم/أرقام.',
    'dimensions' => 'الصورة :attribute لها أبعاد غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مكررة.',
    'doesnt_end_with' => 'The :attribute must not end with one of the following: :values',
    'doesnt_start_with' => 'The :attribute must not start with one of the following: :values',
    'email' => 'يجب على :attribute أن يكون بريد إلكتروني صحيح.',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'enum' => 'The :attribute must be a valid value.',
    'exists' => 'القيمة المحددة :attribute غير موجودة.',
    'file' => 'الملف :attribute يجب أن يكون ملفا.',
    'filled' => 'يجب تعبئة الحقل :attribute.',
    'gt' => [
        'array' => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/بنود.',
        'file' => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون رقم :attribute أكبر من :value.',
        'string' => 'يجب أن يحتوي :attribute على أكثر من :value حرف أو أحرف.',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي :attribute على :value عناصر/بنود أو أكثر.',
        'file' => 'يجب أن يكون حجم الملف :attribute أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون رقم :attribute أكبر من أو يساوي :value.',
        'string' => 'يجب أن يحتوي :attribute على :value حرف أو أحرف أو أكثر.',
    ],
    'image' => 'يجب أن يكون :attribute صورةً.',
    'in' => 'القيمة المحددة :attribute غير موجودة.',
    'in_array' => 'الحقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون :attribute عنوان IP صحيحًا.',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'lt' => [
        'array' => 'يجب أن يحتوي :attribute على أقل من :value عناصر/بنود.',
        'file' => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون رقم :attribute أصغر من :value.',
        'string' => 'يجب أن يحتوي :attribute على أقل من :value حرف أو أحرف.',
    ],
    'lte' => [
        'array' => 'يجب أن يحتوي :attribute على :value عنصر أو أقل.',
        'file' => 'يجب أن يكون حجم الملف :attribute أصغر من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون رقم :attribute أصغر من أو يساوي :value.',
        'string' => 'يجب أن يحتوي :attribute على :value حرف أو أقل.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'يجب أن يحتوي :attribute على :max عنصر أو أقل.',
        'file' => 'يجب أن يكون حجم الملف :attribute أصغر من :max كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute أصغر من :max.',
        'string' => 'يجب أن يحتوي :attribute على :max حرف أو أقل.',
    ],
    'max_digits' => 'The :attribute may not be greater than :digits digits.',
    'mimes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'min' => [
        'array' => 'يجب أن يحتوي :attribute على الأقل على :min عناصر/بنود.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن يكون رقم :attribute على الأقل :min.',
        'string' => 'يجب أن يحتوي :attribute على الأقل على :min حرفًا أو حروف.',
    ],
    'min_digits' => 'The :attribute must be at least :digits digits.',
    'multiple_of' => 'The :attribute must be a multiple of :value',
    'not_in' => 'القيمة المحددة :attribute غير موجودة.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'يجب على :attribute أن يكون رقمًا.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one letter and one number.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The :attribute has been compromised and cannot be used.',
    ],
    'present' => 'يجب تقديم :attribute.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'صيغة :attribute .غير صحيحة',
    'required' => 'حقل :attribute إجباري.',
    'required_array_keys' => 'The :attribute field is required.',
    'required_if' => 'حقل :attribute إجباري عندما يكون :other يساوي :value.',
    'required_unless' => 'حقل :attribute إجباري ما لم يكن :other يساوي :values.',
    'required_with' => 'حقل :attribute إجباري عندما يكون :values موجود.',
    'required_with_all' => 'حقل :attribute إجباري عندما يكون :values موجود.',
    'required_without' => 'حقل :attribute إجباري عندما يكون :values غير موجود.',
    'required_without_all' => 'حقل :attribute إجباري عندما لا يكون أي من :values موجود.',
    'same' => 'يجب أن يتطابق :attribute مع :other.',
    'size' => [
        'array' => 'يجب أن يحتوي :attribute على :size عنصر/بند.',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن يكون :attribute مساويًا لـ :size.',
        'string' => 'يجب أن يحتوي :attribute على :size حرفًا/حروف.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'يجب أن يكون :attribute نصًا.',
    'timezone' => 'يجب أن تكون منطقة :attribute منطقة صالحة.',
    'unique' => 'قيمة :attribute مُستخدمة من قبل.',
    'uploaded' => 'فشل في تحميل :attribute.',
    'url' => 'صيغة عنوان :attribute غير صحيحة.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => []



];
