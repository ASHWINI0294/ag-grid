import { BeanStub } from "./context/beanStub";
import { Column } from "./entities/column";
import { CellPosition } from "./entities/cellPosition";
import { RowNode } from "./entities/rowNode";
import { AbstractHeaderWrapper } from "./headerRendering/header/abstractHeaderWrapper";
import { HeaderPosition } from "./headerRendering/header/headerPosition";
import { ColumnGroup } from "./entities/columnGroup";
import { GridCore } from "./gridCore";
export declare class FocusController extends BeanStub {
    private gridOptionsWrapper;
    private columnController;
    private headerNavigationService;
    private columnApi;
    private gridApi;
    private rowRenderer;
    private rowPositionUtils;
    private rangeController;
    private static FOCUSABLE_SELECTOR;
    private static FOCUSABLE_EXCLUDE;
    private gridCore;
    private focusedCellPosition;
    private focusedHeaderPosition;
    private keyboardFocusActive;
    private init;
    registerGridCore(gridCore: GridCore): void;
    onColumnEverythingChanged(): void;
    isKeyboardFocus(): boolean;
    private activateMouseMode;
    private activateKeyboardMode;
    getFocusCellToUseAfterRefresh(): CellPosition;
    private getGridCellForDomElement;
    clearFocusedCell(): void;
    getFocusedCell(): CellPosition;
    setFocusedCell(rowIndex: number, colKey: string | Column, floating: string | undefined, forceBrowserFocus?: boolean): void;
    isCellFocused(cellPosition: CellPosition): boolean;
    isRowNodeFocused(rowNode: RowNode): boolean;
    isHeaderWrapperFocused(headerWrapper: AbstractHeaderWrapper): boolean;
    clearFocusedHeader(): void;
    getFocusedHeader(): HeaderPosition;
    setFocusedHeader(headerRowIndex: number, column: ColumnGroup | Column): void;
    focusHeaderPosition(headerPosition: HeaderPosition, direction?: 'Before' | 'After'): boolean;
    isAnyCellFocused(): boolean;
    isRowFocused(rowIndex: number, floating: string): boolean;
    findFocusableElements(rootNode: HTMLElement, exclude?: string, onlyUnmanaged?: boolean): HTMLElement[];
    focusFirstFocusableElement(rootNode: HTMLElement, onlyUnmanaged?: boolean): boolean;
    focusLastFocusableElement(rootNode: HTMLElement, onlyUnmanaged?: boolean): boolean;
    findNextFocusableElement(rootNode: HTMLElement, onlyManaged?: boolean, backwards?: boolean): HTMLElement;
    isFocusUnderManagedComponent(rootNode: HTMLElement): boolean;
    findTabbableParent(node: HTMLElement, limit?: number): HTMLElement;
    private onCellFocused;
    focusGridView(column?: Column): boolean;
    focusNextGridCoreContainer(backwards: boolean): boolean;
}
