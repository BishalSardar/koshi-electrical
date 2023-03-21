<li class="nav-main-item">
                            <a class="nav-main-link {{ request()->segment(1) == 'expense' ? 'active' : '' }}"
                                href="{{ route('expense.index') }}">
                                <i class="nav-main-link-icon fa fa-home"></i>
                                <span class="nav-main-link-name">Expense</span>
                            </a>
                        </li>