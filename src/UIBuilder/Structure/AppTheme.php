<?php

namespace FlutterPHP\UIBuilder\Structure;

class AppTheme
{
    public function __construct(
        public string $primary = '#6366F1',
        public string $secondary = '#8B5CF6',
        public string $accent = '#F43F5E',
        public string $background = '#F8FAFC',
        public string $surface = '#FFFFFF',
        public string $onPrimary = '#FFFFFF',
        public string $onSurface = '#1E293B',
        public string $muted = '#64748B',
        public string $border = '#E2E8F0',
        public string $success = '#10B981',
        public string $warning = '#F59E0B',
        public string $error = '#EF4444',
        public string $fontFamily = 'Roboto',
        public float $radiusSm = 8,
        public float $radiusMd = 12,
        public float $radiusLg = 16,
        public float $radiusXl = 24,
        public float $spacingSm = 8,
        public float $spacingMd = 12,
        public float $spacingLg = 16,
        public float $spacingXl = 24,
        public float $elevation = 2,
    ) {}

    public function toArray(): array
    {
        return [
            'colors' => [
                'primary' => $this->primary,
                'secondary' => $this->secondary,
                'accent' => $this->accent,
                'background' => $this->background,
                'surface' => $this->surface,
                'onPrimary' => $this->onPrimary,
                'onSurface' => $this->onSurface,
                'muted' => $this->muted,
                'border' => $this->border,
                'success' => $this->success,
                'warning' => $this->warning,
                'error' => $this->error,
            ],
            'typography' => [
                'fontFamily' => $this->fontFamily,
            ],
            'shape' => [
                'radiusSm' => $this->radiusSm,
                'radiusMd' => $this->radiusMd,
                'radiusLg' => $this->radiusLg,
                'radiusXl' => $this->radiusXl,
            ],
            'spacing' => [
                'sm' => $this->spacingSm,
                'md' => $this->spacingMd,
                'lg' => $this->spacingLg,
                'xl' => $this->spacingXl,
            ],
            'elevation' => $this->elevation,
        ];
    }
}
