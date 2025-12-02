@php($logoClass = $logoClass ?? 'site-logo')
<svg class="{{ $logoClass }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 130" role="presentation"
    aria-hidden="true" focusable="false" preserveAspectRatio="xMinYMid meet">
    <style>
        <![CDATA[
        .brand-text {
            font-family: 'Bebas Neue', 'Oswald', 'Montserrat', Arial, sans-serif;
            font-weight: 800;
            fill: #ffffff;
            font-size: 128px;
            letter-spacing: 0.8px;
            stroke: #0a1629;
            stroke-width: 0.45;
            stroke-opacity: 0.32;
            paint-order: stroke fill;
            transform: skewX(-8deg)
        }

        .brand-sub {
            font-family: 'Plus Jakarta Sans', 'Inter', Arial, sans-serif;
            font-weight: 700;
            fill: rgba(255, 255, 255, 0.9);
            font-size: 21px;
            letter-spacing: 1.3px;
            transform: skewX(-8deg)
        }
        ]]>
    </style>
    <g transform="translate(12,12)">
        <text class="brand-text" x="0" y="78">ETC VALLENAS</text>
        <text class="brand-sub" x="4" y="106">MAQUINARIAS Y EQUIPOS DEL CUSCO S.A.</text>
    </g>
</svg>
