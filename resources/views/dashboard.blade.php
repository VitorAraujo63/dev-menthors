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
            --primary-blue: #2563eb; --primary-blue-dark: #1d4ed8; --primary-blue-light: #3b82f6;
            --accent-purple: #8b5cf6; --neutral-50: #f8fafc; --neutral-100: #f1f5f9;
            --neutral-200: #e2e8f0; --neutral-300: #cbd5e1; --neutral-400: #94a3b8;
            --neutral-500: #64748b; --neutral-600: #475569; --neutral-700: #334155;
            --neutral-800: #1e293b; --neutral-900: #0f172a; --success-green: #10b981;
            --warning-orange: #f59e0b; --danger-red: #ef4444; --danger-red-dark: #dc2626;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background-color: var(--neutral-100); color: var(--neutral-700); line-height: 1.6; }
        .sidebar { position: fixed; left: 0; top: 0; height: 100vh; width: 280px; background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue-dark) 100%); z-index: 1000; transition: transform 0.3s ease; overflow-y: auto; }
        .sidebar-header { padding: 2rem 1.5rem; border-bottom: 1px solid rgba(255, 255, 255, 0.1); }
        .sidebar-logo { display: flex; align-items: center; gap: 1rem; }
        .sidebar-logo-icon { width: 48px; height: 48px; background: rgba(255, 255, 255, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px); }
        .sidebar-logo-text h1 { color: white; font-size: 1.5rem; font-weight: 700; margin: 0; }
        .sidebar-logo-text p { color: rgba(255, 255, 255, 0.8); font-size: 0.875rem; font-weight: 400; }
        .sidebar-nav { padding: 1.5rem 1rem; }
        .sidebar-item { display: flex; align-items: center; gap: 1rem; padding: 1rem 1.25rem; color: rgba(255, 255, 255, 0.8); border-radius: 12px; transition: all 0.3s ease; cursor: pointer; margin-bottom: 0.5rem; font-weight: 500; }
        .sidebar-item:hover { background: rgba(255, 255, 255, 0.1); color: white; transform: translateX(4px); }
        .sidebar-item.active { background: rgba(255, 255, 255, 0.2); color: white; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); }
        .sidebar-item i { width: 20px; text-align: center; font-size: 1.1rem; }
        .main-content { margin-left: 280px; min-height: 100vh; transition: margin-left 0.3s ease; }
        .header { background: white; padding: 1.5rem 2rem; border-bottom: 1px solid var(--neutral-200); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); }
        .header-content { display: flex; align-items: center; justify-content: space-between; }
        .page-title { font-size: 2rem; font-weight: 700; color: var(--neutral-800); }
        .content { padding: 2rem; }
        .section { display: none; }
        .section.active { display: block; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.75rem 1.5rem; border-radius: 12px; font-weight: 600; font-size: 0.875rem; border: none; cursor: pointer; transition: all 0.2s ease; text-decoration: none; }
        .btn-primary { background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark)); color: white; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4); }
        .btn-secondary { background: var(--neutral-100); color: var(--neutral-700); border: 1px solid var(--neutral-200); }
        .btn-secondary:hover { background: var(--neutral-200); transform: translateY(-1px); }
        .btn-danger { background: linear-gradient(135deg, var(--danger-red), var(--danger-red-dark)); color: white; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3); }
        .btn-danger:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4); }
        .btn-sm { padding: 0.5rem 1rem; font-size: 0.75rem; }
        .table-container { background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); border: 1px solid var(--neutral-200); }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 1rem 1.5rem; text-align: left; border-bottom: 1px solid var(--neutral-200); }
        .table th { background: var(--neutral-50); font-weight: 600; color: var(--neutral-700); font-size: 0.875rem; }
        .table tbody tr:hover { background: var(--neutral-50); }
        .actions-container { display: flex; align-items: center; gap: 0.5rem; }
        .modal { display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(30, 41, 59, 0.8); opacity: 0; transition: opacity 0.3s ease; }
        .modal.show { display: flex; align-items: center; justify-content: center; opacity: 1; }
        .modal-open { overflow: hidden; }
        .modal-content { background: white; border-radius: 20px; padding: 2rem; max-width: 500px; width: 90%; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15); }
        .modal-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; }
        .modal-title { font-size: 1.5rem; font-weight: 700; color: var(--neutral-800); }
        .modal-close { background: none; border: none; font-size: 1.5rem; color: var(--neutral-500); cursor: pointer; padding: 0.5rem; border-radius: 8px; transition: all 0.2s ease; }
        .modal-close:hover { background: var(--neutral-100); color: var(--neutral-700); }
        .modal-body { padding: 1rem 0; max-height: 60vh; overflow-y: auto; }
        .modal-footer { display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--neutral-200); }
        .form-input { width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--neutral-300); border-radius: 12px; font-size: 0.875rem; transition: all 0.2s ease; }
        .form-input:focus { outline: none; border-color: var(--primary-blue); box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }
        .form-group { margin-bottom: 1rem; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 1rem; margin-bottom: 1rem; border-radius: 4px; border: 1px solid #c3e6cb; }
        .alert-danger-summary { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; padding: 1rem; margin-bottom: 1rem; border-radius: 4px; }
        .error-message { color: #e74c3c; font-size: 0.875em; margin-top: 0.25rem; }
        .details-grid { display: grid; grid-template-columns: auto 1fr; gap: 1rem 2rem; align-items: center;}
        .details-grid dt { font-weight: 600; color: var(--neutral-600); }
        .help-text { font-size: 0.8em; color: #6c757d; }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
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

    <div class="main-content">
        <header class="header">
            <div class="header-content"><h1 class="page-title" id="pageTitle">Dashboard</h1></div>
        </header>

        <main class="content">
            <div id="dashboard-section" class="section active">
                <h2>Bem-vindo ao Dashboard!</h2>
                <p>Selecione uma opção no menu lateral para começar.</p>
                 @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
            </div>

            <div id="students-section" class="section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2 style="font-size: 1.875rem; font-weight: 700;">Gestão de Alunos</h2>
                    <button class="btn btn-primary" onclick="openModal('createStudentModal')"><i class="fas fa-user-plus"></i> Novo Aluno</button>
                </div>

                @if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
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
                <h2>Gestão de Mentores</h2>
                <p>Conteúdo da seção de mentores aqui.</p>
            </div>

            <div id="classes-section" class="section">
                <h2>Gestão de Aulas</h2>
                <p>Conteúdo da seção de aulas aqui.</p>
            </div>

            <div id="attendance-section" class="section">
                <h2>Controle de Chamada</h2>
                <p>Conteúdo da seção de chamada aqui.</p>
            </div>

            <div id="metrics-section" class="section">
                <h2>Métricas</h2>
                <p>Conteúdo da seção de métricas aqui.</p>
            </div>

            <div id="permissions-section" class="section">
                <h2>Controle de Permissões</h2>
                <p>Conteúdo da seção de permissões aqui.</p>
            </div>

            <div id="feedback-section" class="section">
                <h2>Feedbacks</h2>
                <p>Conteúdo da seção de feedbacks aqui.</p>
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
                        const aluno = await this.fetchStudentData(studentId);
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
                        const aluno = await this.fetchStudentData(studentId);
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

        app.init();
    });
    </script>
</body>
</html>
