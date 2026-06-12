<?php

namespace App\MobileUI\Theme;

use FlutterPHP\UIBuilder\Structure\AppTheme as BaseAppTheme;

class AppTheme
{
    public static function make(): BaseAppTheme
    {
        return new BaseAppTheme(
            primary: '#6366F1', secondary: '#8B5CF6', accent: '#F43F5E',
            background: '#F1F5F9', surface: '#FFFFFF', onPrimary: '#FFFFFF',
            onSurface: '#0F172A', muted: '#64748B', border: '#E2E8F0',
            success: '#10B981', warning: '#F59E0B', error: '#EF4444',
            fontFamily: 'Roboto', radiusSm: 8, radiusMd: 12, radiusLg: 16, radiusXl: 20,
            spacingSm: 8, spacingMd: 12, spacingLg: 16, spacingXl: 24, elevation: 1,
        );
    }
}
