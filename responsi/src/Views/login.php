<div class="w-full max-w-md">
	<div class="bg-white p-8 rounded-2xl shadow-lg border border-secondary-200">

		<div class="text-center mb-8">
			<h1 class="text-3xl font-bold text-primary-700">Login</h1>
			<p class="text-secondary-500 mt-2">Enter your login information to proceed.</p>
		</div>

		<form class="mx-auto space-y-4" hx-post="<?= BASE_PATH ?>/login" hx-target="#message" hx-swap="innerHTML">
			<div id="message" class="mb-4"></div>
			<div class="space-y-6">
				<div class="space-y-2">
					<label for="email" class="label">Email</label>
					<input type="email" name="email" id="email" placeholder="admin@rizalarfiyan.com" required>
				</div>

				<div class="space-y-2">
					<label for="password" class="label">Password</label>
					<input type="password" name="password" id="password" placeholder="••••••••" required>
				</div>

				<div>
					<button type="submit" class="w-full text-white bg-primary-600 cursor-pointer hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition-colors duration-200">
						Masuk
					</button>
				</div>
			</div>
		</form>
	</div>
</div>