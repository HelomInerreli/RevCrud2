# 🧭 Comandos Laravel — Guia Rápido

Um guia simples e visual com os comandos e exemplos mais usados para iniciar e trabalhar com **Laravel 7+**.

---

## 🚀 Criar e Iniciar Projeto

### Criar novo projeto Laravel
```bash
composer create-project --prefer-dist laravel/laravel:^7.0 blog
```
> O nome após `7.0` é o nome do projeto.

### Entrar na pasta do projeto
```bash
cd blog
```

### Iniciar o servidor de desenvolvimento
```bash
php artisan serve
```

---

## 🛠️ Configurar Base de Dados

Crie uma base de dados chamada **blog** no seu SGBD e edite o ficheiro `.env` dentro da pasta do projeto:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog     #Nome da base de dados
DB_USERNAME=root
DB_PASSWORD=         #Adicionar a password do seu SGBD
```

---

## 🧩 Configuração de Front-End e Autenticação

### Instalar o pacote `laravel/ui`
> Necessário para Laravel 7 e 8.
```bash
composer require laravel/ui:^2.4
```

### Gerar front-end com Vue.js e autenticação (login, registo, etc.)
```bash
php artisan ui vue --auth
```

### Instalar dependências JavaScript
```bash
npm install
```

### Compilar arquivos front-end para desenvolvimento
```bash
npm run dev
```

### Executar os dois comandos juntos (Opcional)
```bash
npm i && npm run dev
```

---

## 🧱 Criar Estrutura de Model, Migration e Controller

Cria de uma só vez o **Model**, **Migration** e **Controller** (substitua `Post` pelo nome da classe — sempre no singular).

```bash
php artisan make:model Post -a
```

---

## 📦 Exemplos de Código

### 🧪 Factory — `database/factories/CLASSEFactory.php`
```php
$factory->define(Person::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birth_date' => $faker->date,
        'email' => $faker->unique()->safeEmail,
        'created_at' => now(),
        'updated_at' => now(),
        'deleted_at' => null,
    ];
});
```

### 🗃️ Migration — `database/migrations/xxxx_create_CLASSE_table.php`
```php
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->integer('country_id')->nullable()->constrained('countries'); // Foreign Key para countries
        $table->timestamps();
    });
}
```

### 🌱 Seeder — `database/seeds/CLASSESeeder.php`

#### Dados diretos
```php
public function run()
{
    DB::table('countries')->insert([
        ['name' => 'Portugal'],
        ['name' => 'Espanha'],
        ['name' => 'França'],
        ['name' => 'Polonia'],
    ]);
}
```

#### Dados com Factory
```php
public function run()
{
    factory(App\User::class, 100)->create();
}
```

#### Dados com loop e campo personalizado
```php
public function run()
{
    for ($i = 1; $i <= 100; $i++) {
        factory(App\Bicycle::class)->create(['user_id' => $i]);
        factory(App\Bicycle::class)->create(['user_id' => $i]);
    }
}
```

### 🔗 Seeder Principal — `database/seeds/DatabaseSeeder.php`
```php
public function run()
{
    $this->call(CountrySeeder::class);
    $this->call(UserSeeder::class);
    $this->call(BicycleSeeder::class);
}
```
---
### 📄 Model — `app/CLASSE.php`
> No model da bicicleta onde uma bicicleta tem um dono, mas um dono pode ter várias bicicletas.
```php
class Bicycle extends Model
{
    protected $fillable = ['model', 'brand', 'color', 'price', 'user_id'];

    /**
     * A bicycle belongs to a user (owner).
     */
    public function user()
    {
        /** Muitas bicicletas pertencem a um usuário**/ 
        return $this->belongsTo(User::class); 
    }
}
```

> No model dos paises, diz que cada usuario tem um pais, mas um pais pode ter varios usuarios.
```php
class Country extends Model
{
    protected $fillable = ['name', 'code'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
```

> No model do Usuario, diz que cada usuario tem um pais, e pode ter varias bicicletas.
```php
class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function bicycles()
    {
        return $this->hasMany(Bicycle::class);
    }
}
```

---

## ⚙️ Migrações

### Executar todas as migrações pendentes
```bash
php artisan migrate
```

### Recriar todas as tabelas e rodar os seeders
```bash
php artisan migrate:fresh --seed
```

---

## ▶️ Iniciar o servidor novamente
```bash
php artisan serve
```

---

### 📄 Controller `app/Http/Controllers/CLASSEController.php`
```php
 public function index()
    {
        $users = User::paginate(10); /**Para paginar os dados**/
        return view('pages.users.index', ['users' => $users]);
    }

    public function create()
    {
        $countries = \App\Country::all(); /**Para pegar dados de outro model para listar em um dropdown por exemplo.**/
        return view('pages.users.create', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'country_id' => 'nullable|exists:countries,id',
        ]);

        User::create($data);
        return redirect()->route('users.index')->with('success', 'User created.');
    }

    public function show(User $user)
    {
        return view('pages.users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        $countries = \App\Country::all();
        return view('pages.users.edit', ['user' => $user, 'countries' => $countries]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'country_id' => 'nullable|exists:countries,id',
        ]);

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted.');
    }
```
---
### 📄 Pages `resources/views/pages/CLASSE/CRUD.blade.php` (create, edit, show e index)

```php
#Create
@extends('master.main')
@section('content')
    @component('components.users.users-form-create', ['countries' => $countries])
    @endcomponent
@endsection

#edit
@extends('master.main')
@section('content')
    @component('components.users.users-form-edit', ['user' => $user, 'countries' => $countries])
    @endcomponent
@endsection

#index (Listagem)
@extends('master.main')
@section('content')
    @component('components.users.users-list', ['users' => $users])
    @endcomponent
@endsection

#show
@extends('master.main')
@section('content')
    @component('components.users.users-form-show', ['user' => $user])
    @endcomponent
@endsection

```
---

### 📄 Components `resources/views/components/CLASSE/CLASSE-form-CRUD.blade.php` (create, edit, show e list (CLASSE-list.blade.php))

```html
// Create ---------------------------------------------------------------------
<div class="container mt-4">
    <h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Country</label>
            <select name="country_id" class="form-control">
                <option value="">--</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>

// Edit -----------------------------------------------------------------------
<div class="container mt-4">
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label>Country</label>
            <select name="country_id" class="form-control">
                <option value="">--</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $user->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>

// Show -----------------------------------------------------------------------
<div class="container mt-4">
    <h1>User #{{ $user->id }}</h1>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Country:</strong> {{ optional($user->country)->name }}</p>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
</div>

// List ------------------------------------------------------------------------
<div class="container mt-4">
	<div class="row">
		<div class="col-10">
			<h1 class="text-center text-primary">USERS LIST</h1>
		</div>
		<div class="col-2">
			<a href="{{ url('users/create') }}" class="btn btn-primary mb-3">Create New User</a>
		</div>
	</div>

	<table class="table table-striped">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Country</th>
			<th>Actions</th>
		</tr>
		</thead>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ optional($user->country)->name }}</td>
				<td>
					<a href="{{ route('users.show', $user->id) }}" class="btn btn-success">Show</a>
					<a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
					<form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger" onclick="return confirm('Sure to delete?')">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>

	{{ $users->links() }}
</div>
```