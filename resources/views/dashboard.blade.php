<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevMentors - Dashboard Administrativo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
  --primary-blue: #2563eb;
  --primary-blue-dark: #1d4ed8;
  --primary-blue-light: #3b82f6;
  --accent-purple: #8b5cf6;
  --neutral-50: #f8fafc;
  --neutral-100: #f1f5f9;
  --neutral-200: #e2e8f0;
  --neutral-300: #cbd5e1;
  --neutral-400: #94a3b8;
  --neutral-500: #64748b;
  --neutral-600: #475569;
  --neutral-700: #334155;
  --neutral-800: #1e293b;
  --neutral-900: #0f172a;
  --success-green: #10b981;
  --warning-orange: #f59e0b;
  --danger-red: #ef4444;
  --danger-red-dark: #dc2626;
   --sidebar-width: 240px;


  /* Added responsive spacing variables */
  --sidebar-width: 280px;
  --sidebar-width-collapsed: 80px;
  --header-height: 80px;
  --content-padding: 2rem;
  --border-radius: 12px;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Poppins", sans-serif;
  background-color: var(--neutral-100);
  color: var(--neutral-700);
  line-height: 1.6;
  /* Added smooth font rendering */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.sidebar {
  position: fixed;
  left: 0;
  top: 0;
  height: 100vh;
  width: var(--sidebar-width);
  background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-dark) 100%);
  z-index: 1000;
  transition: all 0.3s ease;
  overflow-y: auto;
  /* Added better scrollbar styling */
  scrollbar-width: thin;
  scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
}

.sidebar::-webkit-scrollbar {
  width: 6px;
}

.sidebar::-webkit-scrollbar-track {
  background: transparent;
}

.sidebar::-webkit-scrollbar-thumb {
  background: rgba(255, 255, 255, 0.3);
  border-radius: 3px;
}

.sidebar.open {
  transform: translateX(0);
}

/* Added collapsed sidebar state for tablets */
.sidebar.collapsed {
  width: var(--sidebar-width-collapsed);
}

.sidebar.collapsed .sidebar-logo-text,
.sidebar.collapsed .sidebar-item span {
  display: none;
}

.sidebar.collapsed .sidebar-item {
  justify-content: center;
  padding: 1rem;
}

.sidebar-header {
  padding: 2rem 1.5rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-logo {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.sidebar-logo-icon {
  width: 48px;
  height: 48px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: var(--border-radius);
  display: flex;
  align-items: center;
  justify-content: center;
  backdrop-filter: blur(10px);
  /* Made icon more flexible */
  flex-shrink: 0;
}

.sidebar-logo-text h1 {
  color: white;
  font-size: 1.5rem;
  font-weight: 700;
  margin: 0;
  /* Added text overflow handling */
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.sidebar-logo-text p {
  color: rgba(255, 255, 255, 0.8);
  font-size: 0.875rem;
  font-weight: 400;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.sidebar-nav {
  padding: 1.5rem 1rem;
}

.sidebar-item {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 1rem 1.25rem;
  color: rgba(255, 255, 255, 0.8);
  border-radius: var(--border-radius);
  transition: all 0.3s ease;
  cursor: pointer;
  margin-bottom: 0.5rem;
  font-weight: 500;
  /* Added better touch targets */
  min-height: 48px;
}

.sidebar-item:hover {
  background: rgba(255, 255, 255, 0.1);
  color: white;
  transform: translateX(4px);
}

.sidebar-item.active {
  background: rgba(255, 255, 255, 0.2);
  color: white;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.sidebar-item i {
  width: 20px;
  text-align: center;
  font-size: 1.1rem;
  flex-shrink: 0;
}

.main-content {
  margin-left: var(--sidebar-width);
  min-height: 100vh;
  transition: margin-left 0.3s ease;
  /* Added flexible layout */
  display: flex;
  flex-direction: column;
}

.header {
  background: white;
  padding: 1.5rem 2rem;
  border-bottom: 1px solid var(--neutral-200);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: center;
  justify-content: space-between;
  /* Added fixed height and better flex behavior */
  height: var(--header-height);
  flex-shrink: 0;
  position: sticky;
  top: 0;
  z-index: 100;
}

.header-left {
  display: flex;
  align-items: center;
  gap: 1rem;
  /* Added overflow handling */
  min-width: 0;
  flex: 1;
}

.mobile-menu-btn {
  display: none;
  background: none;
  border: none;
  font-size: 1.5rem;
  color: var(--neutral-600);
  cursor: pointer;
  /* Added better touch target */
  padding: 0.5rem;
  border-radius: 8px;
  transition: background-color 0.2s ease;
}

.mobile-menu-btn:hover {
  background-color: var(--neutral-100);
}

.page-title {
  font-size: 2rem;
  font-weight: 700;
  color: var(--neutral-800);
  /* Added responsive text sizing and overflow handling */
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  min-width: 0;
}

.content {
  padding: var(--content-padding);
  /* Added flexible growth */
  flex: 1;
  overflow-x: auto;
}

.section {
  display: none;
}

.section.active {
  display: block;
}

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 0.75rem 1.5rem;
  border-radius: var(--border-radius);
  font-weight: 600;
  font-size: 0.875rem;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  text-decoration: none;
  /* Added better touch targets and text handling */
  min-height: 44px;
  white-space: nowrap;
  text-align: center;
}

.btn-primary {
  background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
  color: white;
  box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
}

.btn-secondary {
  background: var(--neutral-100);
  color: var(--neutral-700);
  border: 1px solid var(--neutral-200);
}

.btn-secondary:hover {
  background: var(--neutral-200);
  transform: translateY(-1px);
}

.btn-danger {
  background: linear-gradient(135deg, var(--danger-red), var(--danger-red-dark));
  color: white;
  box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

.btn-danger:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4);
}

.btn-success {
  background: linear-gradient(135deg, var(--success-green), #059669);
  color: white;
  box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.btn-sm {
  padding: 0.5rem 1rem;
  font-size: 0.75rem;
  min-height: 36px;
}

.table-container {
  background: white;
  border-radius: 16px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  border: 1px solid var(--neutral-200);
  overflow-x: auto;
  /* Added better mobile scrolling */
  -webkit-overflow-scrolling: touch;
}

.table {
  width: 100%;
  border-collapse: collapse;
  /* Added minimum width for better mobile experience */
  min-width: 600px;
}

.table th,
.table td {
  padding: 1rem 1.5rem;
  text-align: left;
  border-bottom: 1px solid var(--neutral-200);
  white-space: nowrap;
}

.table th {
  background: var(--neutral-50);
  font-weight: 600;
  color: var(--neutral-700);
  font-size: 0.875rem;
  /* Added sticky headers for better UX */
  position: sticky;
  top: 0;
  z-index: 10;
}

.table tbody tr:hover {
  background: var(--neutral-50);
}

.actions-container {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  /* Added flex wrap for mobile */
  flex-wrap: wrap;
}

.modal {
  display: none;
  position: fixed;
  z-index: 2000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(30, 41, 59, 0.8);
  opacity: 0;
  transition: opacity 0.3s ease;
  /* Added better mobile support */
  padding: 1rem;
}

.modal.show {
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 1;
}

.modal-open {
  overflow: hidden;
}

.modal-content {
  background: white;
  border-radius: 20px;
  padding: 2rem;
  max-width: 500px;
  width: 100%;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  /* Added better mobile sizing and scrolling */
  max-height: calc(100vh - 2rem);
  overflow-y: auto;
  margin: auto;
}

.modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 1.5rem;
  /* Added flex wrap for mobile */
  flex-wrap: wrap;
  gap: 1rem;
}

.modal-title {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--neutral-800);
  /* Added responsive sizing */
  min-width: 0;
  flex: 1;
}

.modal-close {
  background: none;
  border: none;
  font-size: 1.5rem;
  color: var(--neutral-500);
  cursor: pointer;
  padding: 0.5rem;
  border-radius: 8px;
  transition: all 0.2s ease;
  /* Added better touch target */
  min-width: 44px;
  min-height: 44px;
  flex-shrink: 0;
}

.modal-close:hover {
  background: var(--neutral-100);
  color: var(--neutral-700);
}

.modal-body {
  padding: 1rem 0;
  max-height: 60vh;
  overflow-y: auto;
}

.modal-footer {
  display: flex;
  justify-content: flex-end;
  gap: 0.75rem;
  margin-top: 1.5rem;
  padding-top: 1rem;
  border-top: 1px solid var(--neutral-200);
  /* Added flex wrap for mobile */
  flex-wrap: wrap;
}

.form-input {
  width: 100%;
  padding: 0.75rem 1rem;
  border: 1px solid var(--neutral-300);
  border-radius: var(--border-radius);
  font-size: 0.875rem;
  transition: all 0.2s ease;
  /* Added better mobile input styling */
  min-height: 44px;
  -webkit-appearance: none;
  appearance: none;
}

.form-input:focus {
  outline: none;
  border-color: var(--primary-blue);
  box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.form-group {
  margin-bottom: 1rem;
}

.alert-success {
  background-color: #d4edda;
  color: #155724;
  padding: 1rem;
  margin-bottom: 1rem;
  border-radius: 4px;
  border: 1px solid #c3e6cb;
}

.alert-danger-summary {
  background-color: #f8d7da;
  color: #721c24;
  border-color: #f5c6cb;
  padding: 1rem;
  margin-bottom: 1rem;
  border-radius: 4px;
}

.error-message {
  color: #e74c3c;
  font-size: 0.875em;
  margin-top: 0.25rem;
}

.details-grid {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 1rem 2rem;
  align-items: center;
}

.details-grid dt {
  font-weight: 600;
  color: var(--neutral-600);
}

.help-text {
  font-size: 0.8em;
  color: #6c757d;
}

.badge {
  display: inline-flex;
  align-items: center;
  padding: 0.375rem 0.75rem;
  border-radius: 20px;
  font-size: 0.75rem;
  font-weight: 600;
}

.badge-success {
  background: #dcfce7;
  color: #166534;
}

.badge-danger {
  background: #fee2e2;
  color: #991b1b;
}

/* Enhanced responsive breakpoints for all platforms */

/* Large Desktop (1440px+) */
@media (min-width: 1440px) {
  :root {
    --content-padding: 3rem;
  }

  .page-title {
    font-size: 2.5rem;
  }

  .modal-content {
    max-width: 600px;
  }
}

/* Desktop (1024px - 1439px) */
@media (max-width: 1439px) and (min-width: 1024px) {
  :root {
    --content-padding: 2.5rem;
  }
}

/* Tablet Landscape (769px - 1023px) */
@media (max-width: 1023px) and (min-width: 769px) {
  :root {
    --sidebar-width: 240px;
    --content-padding: 2rem;
  }

  .sidebar-header {
    padding: 1.5rem 1rem;
  }

  .sidebar-logo-text h1 {
    font-size: 1.25rem;
  }

  .page-title {
    font-size: 1.75rem;
  }

  .table th,
  .table td {
    padding: 0.75rem 1rem;
  }
}

/* Tablet Portrait & Mobile Landscape (481px - 768px) */
@media (max-width: 768px) {
  .sidebar {
    transform: translateX(-100%);
  }
  .sidebar.open {
    transform: translateX(0);
  }


  .main-content {
    margin-left: 0;
  }

  .mobile-menu-btn {
    display: block;
  }

  .header {
    padding: 1rem 1.5rem;
    height: 70px;
  }

  .content {
    padding: 1.5rem;
  }

  .page-title {
    font-size: 1.5rem;
  }

  .modal-content {
    padding: 1.5rem;
    border-radius: 16px;
  }

  .modal-title {
    font-size: 1.25rem;
  }

  .table th,
  .table td {
    padding: 0.75rem;
    font-size: 0.875rem;
  }

  .btn {
    padding: 0.625rem 1.25rem;
  }

  .details-grid {
    grid-template-columns: 1fr;
    gap: 0.5rem;
  }

  .details-grid dt {
    font-weight: 700;
    margin-bottom: 0.25rem;
  }
}

/* Mobile Portrait (320px - 480px) */
@media (max-width: 480px) {
  :root {
    --content-padding: 1rem;
    --border-radius: 8px;
  }

  .sidebar {
    transform: translateX(-100%);
    width: 100%;
  }

  .sidebar.open {
    transform: translateX(0);
  }

  .main-content {
    margin-left: 0;
  }

  .mobile-menu-btn {
    display: block;
  }

  .header {
    padding: 0.75rem 1rem;
    height: 60px;
  }

  .header-left {
    gap: 0.5rem;
  }

  .content {
    padding: 1rem;
  }

  .page-title {
    font-size: 1.25rem;
  }

  .sidebar-header {
    padding: 1rem;
  }

  .sidebar-logo-text h1 {
    font-size: 1.125rem;
  }

  .sidebar-logo-text p {
    font-size: 0.75rem;
  }

  .sidebar-item {
    padding: 0.875rem 1rem;
    margin-bottom: 0.25rem;
  }

  .modal {
    padding: 0.5rem;
  }

  .modal-content {
    padding: 1rem;
    border-radius: 12px;
    max-height: calc(100vh - 1rem);
  }

  .modal-title {
    font-size: 1.125rem;
  }

  .modal-footer {
    justify-content: stretch;
  }

  .modal-footer .btn {
    flex: 1;
  }

  .table-container {
    border-radius: 8px;
  }

  .table {
    min-width: 500px;
  }

  .table th,
  .table td {
    padding: 0.5rem;
    font-size: 0.8125rem;
  }

  .btn {
    padding: 0.5rem 1rem;
    font-size: 0.8125rem;
  }

  .btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.75rem;
    min-height: 32px;
  }

  .actions-container {
    gap: 0.25rem;
  }

  .form-input {
    font-size: 16px; /* Prevents zoom on iOS */
  }

  .details-grid {
    grid-template-columns: 1fr;
    gap: 0.5rem;
  }

  .badge {
    font-size: 0.6875rem;
    padding: 0.25rem 0.5rem;
  }
}

/* Extra Small Mobile (max 320px) */
@media (max-width: 320px) {
  .header {
    padding: 0.5rem;
  }

  .page-title {
    font-size: 1.125rem;
  }

  .sidebar-logo-icon {
    width: 40px;
    height: 40px;
  }

  .table {
    min-width: 400px;
  }

  .modal-content {
    padding: 0.75rem;
  }
}

/* Added print styles for better document printing */
@media print {
  .sidebar,
  .mobile-menu-btn,
  .modal {
    display: none !important;
  }

  .main-content {
    margin-left: 0 !important;
  }

  .header {
    box-shadow: none;
    border-bottom: 2px solid var(--neutral-300);
  }

  .btn {
    display: none;
  }

  .table-container {
    box-shadow: none;
    border: 1px solid var(--neutral-400);
  }
}

/* Added high contrast mode support */
@media (prefers-contrast: high) {
  :root {
    --neutral-200: #000;
    --neutral-300: #000;
    --neutral-600: #000;
    --neutral-700: #000;
  }

  .btn {
    border: 2px solid currentColor;
  }
}

/* Added reduced motion support */
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
    </style>
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <div class="sidebar-logo-icon"><i class="fas fa-graduation-cap" style="color:white; font-size: 1.5rem;"></i></div>
                <div class="sidebar-logo-text"><h1>DevMentors</h1><p>Admin Dashboard</p></div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-item active" onclick="showSection(event, 'dashboard')"><i class="fas fa-chart-line"></i><span>Dashboard</span></div>
            <div class="sidebar-item" onclick="showSection(event, 'students')"><i class="fas fa-users"></i><span>Alunos & Grupos</span></div>
            <div class="sidebar-item" onclick="showSection(event, 'mentors')"><i class="fas fa-chalkboard-teacher"></i><span>Mentores</span></div>
            <div class="sidebar-item" onclick="showSection(event, 'classes')"><i class="fas fa-book-open"></i><span>Aulas</span></div>
            <div class="sidebar-item" onclick="showSection(event, 'attendance')"><i class="fas fa-clipboard-check"></i><span>Chamada</span></div>
            <div class="sidebar-item" onclick="showSection(event, 'metrics')"><i class="fas fa-chart-bar"></i><span>Métricas</span></div>
            <div class="sidebar-item" onclick="showSection(event, 'permissions')"><i class="fas fa-shield-alt"></i><span>Permissões</span></div>
            <div class="sidebar-item" onclick="showSection(event, 'feedback')"><i class="fas fa-comments"></i><span>Feedbacks</span></div>
        </nav>
    </div>
    </aside>

    <div class="main-content">
        <header class="header">
            <div class="header-left">
                <button class="mobile-menu-btn" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title" id="pageTitle">Dashboard</h1>
            </div>
        </header>

        <main class="content">
            <div id="dashboard-section" class="section active">
                <h2>Bem-vindo ao Dashboard!</h2>
                 @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
            </div>

            <div id="students-section" class="section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2 style="font-size: 1.875rem; font-weight: 700;">Gestão de Alunos</h2>
                    <button class="btn btn-primary" onclick="openModal('createStudentModal')"><i class="fas fa-user-plus"></i> Novo Aluno</button>
                </div>

                @if (session('success') && session('context') === 'aluno') <div class="alert alert-success">{{ session('success') }}</div> @endif

                @if (session('error')) <div class="alert alert-danger-summary">{{ session('error') }}</div> @endif

                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Grupo</th>
                                <th>Data Cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alunos as $aluno)
                                <tr>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>{{ $aluno->email }}</td>
                                    <td>{{ $aluno->grupo ?? 'N/A' }}</td>
                                    <td>{{ $aluno->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="actions-container">
                                            <button type="button" class="btn btn-secondary btn-sm" title="Ver Detalhes" onclick="viewStudent({{ $aluno->id }})"><i class="fa-solid fa-eye"></i></button>
                                            <button type="button" class="btn btn-primary btn-sm" title="Editar Aluno" onclick="editStudent({{ $aluno->id }})"><i class="fa-solid fa-pencil"></i></button>
                                            <form action="{{ route('alunos.destroy', $aluno) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Excluir Aluno" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" style="text-align: center;">Nenhum aluno cadastrado.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="mentors-section" class="section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2 style="font-size: 1.875rem; font-weight: 700;">Gestão de Mentores</h2>
                    <button class="btn btn-primary" onclick="openModal('createMentorModal')">
                        <i class="fas fa-user-plus"></i> Novo Mentor
                    </button>
                </div>

                @if (session('success') && session('context') === 'mentor') <div class="alert alert-success">{{ session('success') }}</div> @endif

                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Cargo</th>
                                <th>Data Cadastro</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mentores as $mentor)
                                <tr>
                                    <td>{{ $mentor->nome }}</td>
                                    <td>{{ $mentor->email }}</td>
                                    <td>{{ $mentor->funcao }}</td>
                                    <td>{{ $mentor->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @if($mentor->status == 'Ativo')
                                            <span class="badge badge-success">Ativo</span>
                                        @else
                                            <span class="badge badge-danger">Inativo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="actions-container">
                                            <button type="button" class="btn btn-secondary btn-sm" title="Ver Detalhes" onclick="viewMentor({{ $mentor->id }})"><i class="fa-solid fa-eye"></i></button>
                                            <button type="button" class="btn btn-primary btn-sm" title="Editar Mentor" onclick="editMentor({{ $mentor->id }})"><i class="fa-solid fa-pencil"></i></button>
                                            <form action="{{ route('mentores.status', $mentor) }}" method="POST">
                                                @csrf
                                                @method('PATCH')


                                                @php
                                                    $isAtivo = strtolower($mentor->status) === 'ativo';
                                                @endphp

                                                <button type="submit" class="btn btn-sm {{ $isAtivo ? 'btn-danger' : 'btn-success' }}" title="{{ $isAtivo ? 'Desativar' : 'Ativar' }}">
                                                    <i class="fas {{ $isAtivo ? 'fa-ban' : 'fa-check' }}"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('mentores.destroy', $mentor) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Excluir Mentor" onclick="return confirm('Tem certeza?')"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" style="text-align:center;">Nenhum mentor cadastrado.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

                <div id="classes-section" class="section"><h2>Gestão de Aulas</h2><p>Em breve...</p></div>
                <div id="attendance-section" class="section"><h2>Controle de Chamada</h2><p>Em breve...</p></div>
                <div id="metrics-section" class="section"><h2>Métricas</h2><p>Em breve...</p></div>
                <div id="permissions-section" class="section"><h2>Controle de Permissões</h2><p>Em breve...</p></div>
                <div id="feedback-section" class="section"><h2>Feedbacks</h2><p>Em breve...</p></div>
            </main>
        </div>



        </main>
    </div>

    <div id="createStudentModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Novo Aluno</h3>
                <button class="modal-close" onclick="closeModal('createStudentModal')"><i class="fas fa-times"></i></button>
            </div>
            <form action="{{ route('alunos.store') }}" method="POST">
                @csrf
                <input type="hidden" name="from_modal_create" value="1">
                <div class="modal-body">
                    <div class="form-group"><label for="create_nome">Nome Completo</label><input type="text" name="nome" id="create_nome" value="{{ old('nome') }}" class="form-input @error('nome') is-invalid @enderror" required>@error('nome') <div class="error-message">{{ $message }}</div> @enderror</div>
                    <div class="form-group"><label for="create_email">E-mail</label><input type="email" name="email" id="create_email" value="{{ old('email') }}" class="form-input @error('email') is-invalid @enderror" required>@error('email') <div class="error-message">{{ $message }}</div> @enderror</div>
                    <div class="form-group"><label for="create_telefone">Telefone</label><input type="tel" name="telefone" id="create_telefone" value="{{ old('telefone') }}" class="form-input @error('telefone') is-invalid @enderror" required pattern="[0-9]*" minlength="10" maxlength="11" placeholder="Apenas números">@error('telefone') <div class="error-message">{{ $message }}</div> @enderror</div>
                    <div class="form-group"><label for="create_data_nascimento">Data de Nascimento</label><input type="date" name="data_nascimento" id="create_data_nascimento" value="{{ old('data_nascimento') }}" class="form-input @error('data_nascimento') is-invalid @enderror">@error('data_nascimento') <div class="error-message">{{ $message }}</div> @enderror</div>
                    <hr style="margin: 1.5rem 0; border-color: var(--neutral-200);"><h4 style="margin-bottom:1rem; font-weight:600; color: var(--neutral-600);">Opcional</h4>
                    <div class="form-group"><label for="create_grupo">Grupo</label><input type="text" name="grupo" id="create_grupo" value="{{ old('grupo') }}" class="form-input @error('grupo') is-invalid @enderror">@error('grupo') <div class="error-message">{{ $message }}</div> @enderror</div>
                    <div class="form-group"><label for="create_nome_responsavel">Nome do Responsável</label><input type="text" name="nome_responsavel" id="create_nome_responsavel" value="{{ old('nome_responsavel') }}" class="form-input @error('nome_responsavel') is-invalid @enderror">@error('nome_responsavel') <div class="error-message">{{ $message }}</div> @enderror</div>
                    <div class="form-group"><label for="create_tel_responsavel">Telefone do Responsável</label><input type="tel" name="tel_responsavel" id="create_tel_responsavel" value="{{ old('tel_responsavel') }}" class="form-input @error('tel_responsavel') is-invalid @enderror" pattern="[0-9]*" minlength="10" maxlength="11" placeholder="Apenas números">@error('tel_responsavel') <div class="error-message">{{ $message }}</div> @enderror</div>
                    <hr style="margin: 1.5rem 0; border-color: var(--neutral-200);"><h4 style="margin-bottom:1rem; font-weight:600; color: var(--neutral-600);">Segurança</h4>
                    <div class="form-group"><label for="create_password">Senha</label><input type="password" name="password" id="create_password" class="form-input @error('password') is-invalid @enderror" required>@error('password') <div class="error-message">{{ $message }}</div> @enderror</div>
                    <div class="form-group"><label for="create_password_confirmation">Confirmar Senha</label><input type="password" name="password_confirmation" id="create_password_confirmation" class="form-input" required></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('createStudentModal')">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar Aluno</button>
                </div>
            </form>
        </div>
    </div>

    <div id="viewStudentModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="viewStudentTitle">Detalhes do Aluno</h3>
                <button class="modal-close" onclick="closeModal('viewStudentModal')"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body" id="viewStudentDetails"><p>Carregando...</p></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('viewStudentModal')">Fechar</button>
            </div>
        </div>
    </div>

    <div id="editStudentModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editStudentTitle">Editar Aluno</h3>
                <button class="modal-close" onclick="closeModal('editStudentModal')"><i class="fas fa-times"></i></button>
            </div>
            <form id="editStudentForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="from_modal_edit" value="1">
                <div class="modal-body">
                    <div class="form-group"><label for="edit_nome">Nome Completo</label><input type="text" name="nome" id="edit_nome" class="form-input" required></div>
                    <div class="form-group"><label for="edit_email">E-mail</label><input type="email" name="email" id="edit_email" class="form-input" required></div>
                    <div class="form-group"><label for="edit_telefone">Telefone</label><input type="tel" name="telefone" id="edit_telefone" class="form-input" required pattern="[0-9]*" minlength="10" maxlength="11" placeholder="Apenas números"></div>
                    <div class="form-group"><label for="edit_data_nascimento">Data de Nascimento</label><input type="date" name="data_nascimento" id="edit_data_nascimento" class="form-input"></div>
                    <hr style="margin: 1.5rem 0; border-color: var(--neutral-200);"><h4 style="margin-bottom:1rem; font-weight:600; color: var(--neutral-600);">Opcional</h4>
                    <div class="form-group"><label for="edit_grupo">Grupo</label><input type="text" name="grupo" id="edit_grupo" class="form-input"></div>
                    <div class="form-group"><label for="edit_nome_responsavel">Nome do Responsável</label><input type="text" name="nome_responsavel" id="edit_nome_responsavel" class="form-input"></div>
                    <div class="form-group"><label for="edit_tel_responsavel">Telefone do Responsável</label><input type="tel" name="tel_responsavel" id="edit_tel_responsavel" class="form-input" pattern="[0-9]*" minlength="10" maxlength="11" placeholder="Apenas números"></div>
                    <hr style="margin: 1.5rem 0; border-color: var(--neutral-200);"><h4 style="margin-bottom:1rem; font-weight:600; color: var(--neutral-600);">Segurança</h4>
                    <div class="form-group"><label for="edit_password">Nova Senha</label><input type="password" name="password" id="edit_password" class="form-input"><p class="help-text">Deixe em branco para não alterar.</p></div>
                    <div class="form-group"><label for="edit_password_confirmation">Confirmar Nova Senha</label><input type="password" name="password_confirmation" id="edit_password_confirmation" class="form-input"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('editStudentModal')">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>

        <div id="createMentorModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Novo Mentor</h3>
                <button class="modal-close" onclick="closeModal('createMentorModal')"><i class="fas fa-times"></i></button>
            </div>
            <form action="{{ route('mentores.store') }}" method="POST">
                @csrf
                <input type="hidden" name="from_modal_create_mentor" value="1">
                <div class="modal-body">
                    <div class="form-group"><label for="mentor_nome">Nome</label><input type="text" name="nome" id="mentor_nome" class="form-input" required></div>
                    <div class="form-group"><label for="mentor_email">Email</label><input type="email" name="email" id="mentor_email" class="form-input" required></div>
                    <div class="form-group"><label for="mentor_cargo">Cargo</label><input type="text" name="funcao" id="mentor_cargo" class="form-input" required></div>
                    <hr style="margin: 1.5rem 0;">
                    <div class="form-group"><label for="mentor_password">Senha</label><input type="password" name="password" id="mentor_password" class="form-input" required></div>
                    <div class="form-group"><label for="mentor_password_confirmation">Confirmar Senha</label><input type="password" name="password_confirmation" id="mentor_password_confirmation" class="form-input" required></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('createMentorModal')">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="viewMentorModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="viewMentorTitle">Detalhes do Mentor</h3>
                <button class="modal-close" onclick="closeModal('viewMentorModal')"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body" id="viewMentorDetails"><p>Carregando...</p></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('viewMentorModal')">Fechar</button>
            </div>
        </div>
    </div>

    <div id="editMentorModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editMentorTitle">Editar Mentor</h3>
                <button class="modal-close" onclick="closeModal('editMentorModal')"><i class="fas fa-times"></i></button>
            </div>
            <form id="editMentorForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="from_modal_edit_mentor" value="1">
                <div class="modal-body">
                    <div class="form-group"><label for="edit_mentor_nome">Nome</label><input type="text" name="nome" id="edit_mentor_nome" class="form-input" required></div>
                    <div class="form-group"><label for="edit_mentor_email">Email</label><input type="email" name="email" id="edit_mentor_email" class="form-input" required></div>
                    <div class="form-group"><label for="edit_mentor_cargo">Cargo</label><input type="text" name="funcao" id="edit_mentor_cargo" class="form-input" required></div>
                    <hr style="margin: 1.5rem 0;">
                    <div class="form-group"><label for="edit_mentor_password">Nova Senha</label><input type="password" name="password" id="edit_mentor_password" class="form-input"><p class="help-text">Deixe em branco para não alterar.</p></div>
                    <div class="form-group"><label for="edit_mentor_password_confirmation">Confirmar Nova Senha</label><input type="password" name="password_confirmation" id="edit_mentor_password_confirmation" class="form-input"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('editMentorModal')">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
        const app = {
            navigation: {
                showSection(event, sectionName) {
                    if (event) event.preventDefault();
                    document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
                    const targetSection = document.getElementById(sectionName + '-section');
                    if(targetSection) targetSection.classList.add('active');

                    document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
                    if(event) event.currentTarget.closest('.sidebar-item').classList.add('active');

                    const titles = {
                        'dashboard': 'Dashboard',
                        'students': 'Alunos & Grupos',
                        'mentors': 'Mentores',
                        'classes': 'Aulas',
                        'attendance': 'Chamada',
                        'metrics': 'Métricas',
                        'permissions': 'Permissões',
                        'feedback': 'Feedbacks'
                    };
                    document.getElementById('pageTitle').textContent = titles[sectionName] || 'Dashboard';
                    localStorage.setItem('activeSection', sectionName);
                }
            },
            modal: {
                open(modalId) {
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        document.body.classList.add('modal-open');
                        modal.classList.add('show');
                    }
                },
                close(modalId) {
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        document.body.classList.remove('modal-open');
                        modal.classList.remove('show');
                    }
                },
                setupListeners() {
                    window.addEventListener('click', (event) => { if (event.target.classList.contains('modal')) this.close(event.target.id); });
                    window.addEventListener('keydown', (event) => {
                        if (event.key === 'Escape') {
                            const openModal = document.querySelector('.modal.show');
                            if (openModal) this.close(openModal.id);
                        }
                    });
                }
            },
            studentActions: {
                async fetchStudentData(studentId) {
                    const response = await fetch(`/alunos/json/${studentId}`);
                    if (!response.ok) {
                        throw new Error('Aluno não encontrado ou erro no servidor.');
                    }
                    return await response.json();
                },
                async view(studentId) {
                    const modalId = 'viewStudentModal';
                    const detailsContainer = document.getElementById('viewStudentDetails');
                    const studentTitle = document.getElementById('viewStudentTitle');

                    detailsContainer.innerHTML = '<p>Carregando...</p>';
                    app.modal.open(modalId);

                    try {
                        // CORRIGIDO AQUI
                        const aluno = await app.studentActions.fetchStudentData(studentId);

                        studentTitle.textContent = `Detalhes: ${aluno.nome}`;
                        const birthDate = aluno.data_nascimento ? new Date(aluno.data_nascimento + 'T00:00:00').toLocaleDateString('pt-BR', { timeZone: 'UTC' }) : 'Não informado';

                        detailsContainer.innerHTML = `
                            <dl class="details-grid">
                                <dt>ID:</dt><dd>${aluno.id}</dd>
                                <dt>Nome:</dt><dd>${aluno.nome}</dd>
                                <dt>Email:</dt><dd>${aluno.email}</dd>
                                <dt>Telefone:</dt><dd>${aluno.telefone || 'N/A'}</dd>
                                <dt>Data de Nascimento:</dt><dd>${birthDate}</dd>
                                <dt>Grupo:</dt><dd>${aluno.grupo || 'N/A'}</dd>
                                <dt>Nome do Responsável:</dt><dd>${aluno.nome_responsavel || 'N/A'}</dd>
                                <dt>Telefone do Responsável:</dt><dd>${aluno.tel_responsavel || 'N/A'}</dd>
                            </dl>
                        `;
                    } catch (error) {
                        detailsContainer.innerHTML = `<p style="color:red;">${error.message}</p>`;
                    }
                },
                async edit(studentId) {
                    const modalId = 'editStudentModal';
                    const form = document.getElementById('editStudentForm');
                    const title = document.getElementById('editStudentTitle');

                    form.reset();
                    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                    form.querySelectorAll('.error-message').forEach(el => el.textContent = '');
                    title.textContent = 'Editar Aluno';
                    app.modal.open(modalId);

                    try {
                        // CORRIGIDO AQUI
                        const aluno = await app.studentActions.fetchStudentData(studentId);

                        form.action = `/alunos/${aluno.id}`;
                        title.textContent = `Editar: ${aluno.nome}`;

                        form.querySelector('#edit_nome').value = aluno.nome || '';
                        form.querySelector('#edit_email').value = aluno.email || '';
                        form.querySelector('#edit_telefone').value = aluno.telefone || '';
                        form.querySelector('#edit_data_nascimento').value = aluno.data_nascimento || '';
                        form.querySelector('#edit_grupo').value = aluno.grupo || '';
                        form.querySelector('#edit_nome_responsavel').value = aluno.nome_responsavel || '';
                        form.querySelector('#edit_tel_responsavel').value = aluno.tel_responsavel || '';
                    } catch (error) {
                        alert('Erro ao carregar dados do aluno.');
                        app.modal.close(modalId);
                    }
                }
            },
            mentorActions: {
            async fetch(id) {
                const response = await fetch(`/mentores/json/${id}`);
                if (!response.ok) throw new Error('Mentor não encontrado.');
                // console.log(await response.json());
                const data = await response.json();

                return data;
            },
            async view(id) {
                const modalId = 'viewMentorModal';
                const detailsContainer = document.getElementById('viewMentorDetails');
                const title = document.getElementById('viewMentorTitle');

                detailsContainer.innerHTML = '<p>Carregando...</p>';
                app.modal.open(modalId);

                try {
                    const mentorArray = await app.mentorActions.fetch(id);
                    const mentor = mentorArray[0];

                    title.textContent = `Detalhes: ${mentor.nome}`;
                    detailsContainer.innerHTML = `
                        <dl class="details-grid">
                            <dt>ID:</dt><dd>${mentor.id}</dd>
                            <dt>Nome:</dt><dd>${mentor.nome}</dd>
                            <dt>Email:</dt><dd>${mentor.email}</dd>
                            <dt>Cargo:</dt><dd>${mentor.funcao || 'N/A'}</dd>
                            <dt>Status:</dt><dd>${mentor.status || 'N/A'}</dd>
                        </dl>`;
                } catch (error) {
                    detailsContainer.innerHTML = `<p style="color:red;">${error.message}</p>`;
                }
            },
            async edit(id) {
                const modalId = 'editMentorModal';
                const form = document.getElementById('editMentorForm');
                const title = document.getElementById('editMentorTitle');

                form.reset();
                app.modal.open(modalId);

                try {
                    const mentorArray = await app.mentorActions.fetch(id);
                    const mentor = mentorArray[0];
                    form.action = `/mentores/${mentor.id}`;
                    title.textContent = `Editar: ${mentor.nome}`;

                    form.querySelector('#edit_mentor_nome').value = mentor.nome;
                    form.querySelector('#edit_mentor_email').value = mentor.email;
                    form.querySelector('#edit_mentor_cargo').value = mentor.funcao;
                } catch (error) {
                    alert('Erro ao carregar dados do mentor: ' + error.message);
                    app.modal.close(modalId);
                }
            }
        },
            init() {
                this.modal.setupListeners();
                const activeSection = localStorage.getItem('activeSection');
                if (activeSection) {
                    const sidebarItem = document.querySelector(`.sidebar-item[onclick*="'${activeSection}'"]`);
                    if(sidebarItem) {
                        const fakeEvent = { currentTarget: sidebarItem, preventDefault: () => {} };
                        app.navigation.showSection(fakeEvent, activeSection);
                    }
                }
                @if ($errors->any() && session('from_modal_create'))
                    app.modal.open('createStudentModal');
                @endif
                @if ($errors->any() && session('from_modal_edit'))
                    @session('error_aluno_id')
                        this.studentActions.edit({{ session('error_aluno_id') }});
                    @endsession
                @endif
            }
        };



        window.showSection = (event, sectionName) => app.navigation.showSection(event, sectionName);
        window.openModal = (modalId) => app.modal.open(modalId);
        window.closeModal = (modalId) => app.modal.close(modalId);
        window.viewStudent = (studentId) => app.studentActions.view(studentId);
        window.editStudent = (studentId) => app.studentActions.edit(studentId);
        window.viewMentor = (id) => app.mentorActions.view(id);
        window.editMentor = (id) => app.mentorActions.edit(id);



        app.init();
    });

    function showSection(event, section) {
            // Atualiza título
            const pageTitle = document.getElementById('pageTitle');
            const sectionName = {
                'dashboard': 'Dashboard',
                'students': 'Alunos & Grupos',
                'mentors': 'Mentores',
                'classes': 'Aulas',
                'attendance': 'Chamada',
                'metrics': 'Métricas',
                'permissions': 'Permissões',
                'feedback': 'Feedbacks'
            };
            pageTitle.textContent = sectionName[section] || 'Dashboard';

            // Esconde todas as seções
            document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));

            // Mostra apenas a escolhida
            const target = document.getElementById(`${section}-section`);
            if (target) target.classList.add('active');

            // Atualiza o item ativo no menu lateral
            document.querySelectorAll('.sidebar-item').forEach(i => i.classList.remove('active'));
            if (event && event.currentTarget) {
                event.currentTarget.classList.add('active');
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }

    // Fechar sidebar ao clicar em um item no mobile
    document.querySelectorAll('.sidebar-item').forEach(item => {
        item.addEventListener('click', () => {
            if (window.innerWidth <= 768) { // somente mobile
                document.getElementById('sidebar').classList.remove('open');
            }
        });
    });
</script>
</body>
</html>
