<?php
	$appName = 'Responsi';
	$current = $_SERVER['REQUEST_URI'];
	$menus = [
		[
			'path' => BASE_PATH . '/login',
			'name' => 'Login',
		]
	];

	if (isset($_SESSION['user'])) {
		$menus = [
			[
				'path' => BASE_PATH . '/',
				'name' => 'Home',
			],
			[
				'path' => BASE_PATH . '/student',
				'name' => 'Student',
			],
			[
				'path' => BASE_PATH . '/study-program',
				'name' => 'Study Program',
			],
			[
				'path' => BASE_PATH . '/logout',
				'name' => 'Logout',
			]
		];
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= isset($title) ? "{$title} - {$appName}" : $appName ?></title>
	<script src="/tailwindcss.min.js"></script>
	<script src="/htmx.min.js"></script>
	<script src="/_hyperscript.min.js"></script>
    <style type="text/tailwindcss">
		@theme {
			--color-*: initial;
			--color-black: #000;
			--color-white: #fff;

			--color-primary-50: oklch(0.97 0.014 254.604);
			--color-primary-100: oklch(0.932 0.032 255.585);
			--color-primary-200: oklch(0.882 0.059 254.128);
			--color-primary-300: oklch(0.809 0.105 251.813);
			--color-primary-400: oklch(0.707 0.165 254.624);
			--color-primary-500: oklch(0.623 0.214 259.815);
			--color-primary-600: oklch(0.546 0.245 262.881);
			--color-primary-700: oklch(0.488 0.243 264.376);
			--color-primary-800: oklch(0.424 0.199 265.638);
			--color-primary-900: oklch(0.379 0.146 265.522);
			--color-primary-950: oklch(0.282 0.091 267.935);

			--color-secondary-50: oklch(0.984 0.003 247.858);
			--color-secondary-100: oklch(0.968 0.007 247.896);
			--color-secondary-200: oklch(0.929 0.013 255.508);
			--color-secondary-300: oklch(0.869 0.022 252.894);
			--color-secondary-400: oklch(0.704 0.04 256.788);
			--color-secondary-500: oklch(0.554 0.046 257.417);
			--color-secondary-600: oklch(0.446 0.043 257.281);
			--color-secondary-700: oklch(0.372 0.044 257.287);
			--color-secondary-800: oklch(0.279 0.041 260.031);
			--color-secondary-900: oklch(0.208 0.042 265.755);
			--color-secondary-950: oklch(0.129 0.042 264.695);

			--color-danger-50: oklch(0.971 0.013 17.38);
			--color-danger-100: oklch(0.936 0.032 17.717);
			--color-danger-200: oklch(0.885 0.062 18.334);
			--color-danger-300: oklch(0.808 0.114 19.571);
			--color-danger-400: oklch(0.704 0.191 22.216);
			--color-danger-500: oklch(0.637 0.237 25.331);
			--color-danger-600: oklch(0.577 0.245 27.325);
			--color-danger-700: oklch(0.505 0.213 27.518);
			--color-danger-800: oklch(0.444 0.177 26.899);
			--color-danger-900: oklch(0.396 0.141 25.723);
			--color-danger-950: oklch(0.258 0.092 26.042);

			--color-success-50: oklch(0.979 0.021 166.113);
			--color-success-100: oklch(0.95 0.052 163.051);
			--color-success-200: oklch(0.905 0.093 164.15);
			--color-success-300: oklch(0.845 0.143 164.978);
			--color-success-400: oklch(0.765 0.177 163.223);
			--color-success-500: oklch(0.696 0.17 162.48);
			--color-success-600: oklch(0.596 0.145 163.225);
			--color-success-700: oklch(0.508 0.118 165.612);
			--color-success-800: oklch(0.432 0.095 166.913);
			--color-success-900: oklch(0.378 0.077 168.94);
			--color-success-950: oklch(0.262 0.051 172.552);

			--color-warning-50: oklch(0.987 0.022 95.277);
			--color-warning-100: oklch(0.962 0.059 95.617);
			--color-warning-200: oklch(0.924 0.12 95.746);
			--color-warning-300: oklch(0.879 0.169 91.605);
			--color-warning-400: oklch(0.828 0.189 84.429);
			--color-warning-500: oklch(0.769 0.188 70.08);
			--color-warning-600: oklch(0.666 0.179 58.318);
			--color-warning-700: oklch(0.555 0.163 48.998);
			--color-warning-800: oklch(0.473 0.137 46.201);
			--color-warning-900: oklch(0.414 0.112 45.904);
			--color-warning-950: oklch(0.279 0.077 45.635);
		}

		@utility container {
			margin-left: auto;
			margin-right: auto;
		}

		@layer components {
			.modal {
				@apply fixed inset-0 flex flex-col items-center bg-white/50 z-[51] animate-[fadeIn_150ms_ease];
			}

			.modal > .overlay {
				@apply fixed inset-0 z-[-1] bg-black/50 cursor-pointer;
			}

			.modal > .content {
				@apply relative bg-white rounded-md border border-secondary-200 max-w-lg w-[calc(100%)] p-6 animate-[zoomIn_150ms_ease] mt-[10vh];
			}

			.modal.closing {
				@apply animate-[fadeOut_150ms_ease];
			}

			.modal.closing > .content {
				@apply animate-[zoomOut_150ms_ease];
			}

			.modal button.close {
				@apply absolute p-2 bg-white rounded-full cursor-pointer -right-2 -top-2 text-secondary-300;
			}

			label,
			.label {
				@apply block text-sm font-medium;
			}

			input,
			select,
			textarea {
				@apply bg-secondary-50 border-secondary-300 block p-2.5 w-full border text-sm rounded-lg disabled:cursor-not-allowed disabled:opacity-60;
			}

			@keyframes fadeIn {
				0% {
					opacity: 0;
				}
				100% {
					opacity: 1;
				}
			}

			@keyframes fadeOut {
				0% {
					opacity: 1;
				}
				100% {
					opacity: 0;
				}
			}

			@keyframes zoomIn {
				0% {
					transform: scale(0.9);
				}
				100% {
					transform: scale(1);
				}
			}

			@keyframes zoomOut {
				0% {
					transform: scale(1);
				}
				100% {
					transform: scale(0.9);
				}
			}
		}
    </style>
</head>

<body class="font-sans antialiased scroll-smooth bg-secondary-50 text-secondary-800 flex flex-col min-h-screen">
	<header class="fixed top-0 left-0 w-full border-b text-secondary-800 bg-white z-50 border-secondary-300">
		<div class="container flex justify-between items-center gap-4">
			<div class="text-2xl font-semibold">
				<?= $appName ?>
			</div>
			<ul class="flex gap-2 p-4">
				<?php foreach ($menus as $menu): ?>
					<li><a class="px-3 py-2 font-semibold transition-colors duration-300 text-secondary-600 hover:text-primary-600 <?= $menu['path'] == $current ? '!text-primary-600 underline underline-offset-2 decoration-2' : '' ?>" href="<?= $menu['path'] ?>"><?= $menu['name'] ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</header>
	<main class="mt-16 grow container <?= $mainClass ?? '' ?>">
