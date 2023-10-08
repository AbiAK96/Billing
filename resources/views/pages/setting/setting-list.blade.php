@extends('../layout/' . $layout)

@section('subhead')
    <title>Appearance List</title>
@endsection

@section('subcontent')
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('message') }}<button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert" style="margin-top: 10px;">{{ session('error') }}<button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"><i data-lucide="x" class="w-4 h-4"></i></button></div>
        @endif
    <h2 class="intro-y text-lg font-medium mt-10">Appearance List</h2>
    <div class="intro-y box mt-5">
        <div id="checkbox-switch" class="p-3">
            <div class="preview">
                <div class="mt-1">
                    <div class="mt-0">
                        <div data-url="{{ route('dark-mode-switcher') }}" class="dark-mode-switcher">
                            <div class="dark-mode-switcher__container">
                                <div id="checkbox-switch-7" class="dark-mode-switcher__toggle {{ $dark_mode ? 'dark-mode-switcher__toggle--active' : '' }} border"></div>
                                <label class="form-check-label" for="checkbox-switch-7">Dark Mode</label>
                            </div>
                        </div>
                        <style>
                            .dark-mode-switcher__container {
                                display: flex;
                                align-items: center;
                                gap: 5px;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y box mt-5">
        <div id="checkbox-switch" class="p-5">
            <div class="preview">
                <div class="mt-3">
                    <div class="mt-2">
                        <div class="fixed bottom-0 left-0 h-12 px-3 flex items-center justify-center">
                            <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'default']) }}" class="block w-8 h-8 cursor-pointer bg-cyan-900 rounded-full border-4 mr-1 hover:border-slate-200 {{ $color_scheme =='default' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
                            <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'theme-1']) }}" class="block w-8 h-8 cursor-pointer bg-blue-800 rounded-full border-4 mr-1 hover:border-slate-200 {{ $color_scheme =='theme-1' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
                            <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'theme-2']) }}" class="block w-8 h-8 cursor-pointer bg-blue-900 rounded-full border-4 mr-1 hover:border-slate-200 {{ $color_scheme =='theme-2' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
                            <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'theme-3']) }}" class="block w-8 h-8 cursor-pointer bg-emerald-900 rounded-full border-4 mr-1 hover:border-slate-200 {{ $color_scheme =='theme-3' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
                            <a href="{{ route('color-scheme-switcher', ['color_scheme' => 'theme-4']) }}" class="block w-8 h-8 cursor-pointer bg-indigo-900 rounded-full border-4 hover:border-slate-200 {{ $color_scheme =='theme-4' ? 'border-slate-300 dark:border-darkmode-800/80' : 'border-white dark:border-darkmode-600' }}"></a>
                            <div class="mr-4 ml-2 hidden sm:block text-slate-600 dark:text-slate-200">Color Scheme</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
